<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryFormRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authenticated_user_id = request()->user()->id;
        $categories = Category::where("user_id", $authenticated_user_id)->get();

        return view("categories.index", ["categories" => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = new Category();
        return view("categories.form", ["category" => $category]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryFormRequest $request)
    {
        $category = new Category();
        $category->name = $request->get("name");
        $category->description = $request->get("description");
        $category->user_id = $request->user()->id;

        $category->save();
        
        return to_route("categories.index")->with("success", "category created successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view("categories.show", ["category" => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view("categories.form", ["category" => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryFormRequest $request, Category $category)
    {
        $category->update($request->validated());
        return to_route("categories.index")->with("success", "category updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if ($category->user_id ?? false) {
            $category->delete();
            return to_route("categories.index")->with("success", "category deleted successfully");
        }
        return to_route("categories.index")->with("failure", "cannot delete a system category");
    }
}
