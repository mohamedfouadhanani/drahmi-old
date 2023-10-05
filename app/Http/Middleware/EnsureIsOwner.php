<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureIsOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $resource): Response
    {
        $element = $request->route($resource);
        
        if (in_array($resource, ["account", "category"])) {
            $element_user_id = $element->user_id;
        } elseif (in_array($resource, ["income", "expense", "target"])) {
            $element_user_id = $element->account->user_id;
        } elseif (in_array($resource, ["transfer"])) {
            $element_user_id = $element->from_account->user_id;
        }
        
        $request_resource = $request->segments()[0];
        $authenticated_user_id = $request->user()->id;
        if ($element_user_id != $authenticated_user_id) {
            return to_route("$request_resource.index");
        }

        return $next($request);
    }
}
