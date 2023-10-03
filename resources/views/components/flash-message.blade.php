@props(['name'])

@php
    $is_success = $name == "success";
    $is_failure = $name == "failure";

    $dynamic_classes = [
        "ring-2 p-4 rounded capitalize font-semibold flex justify-between items-center", 
        "ring-success text-success bg-green-200" => $is_success,
        "ring-error text-error bg-red-200" => $is_failure,
    ];
@endphp

@if (session()->has($name))
    <section @class($dynamic_classes) id="flash-message">
        <section>
            {{ session($name) }}
        </section>
        <section>
            <button id="flash-message-btn"><i class="fa-solid fa-xmark"></i></button>
        </section>
    </section>
@endif