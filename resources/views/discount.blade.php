@extends('layout/mainLayout')

@section('main')

    <h1 class="h-style">{{ count($products) == 0 ? "Tuščia": "Produktai su akcija"; }}</h1>

    <div class="flex flex-wrap justify-evenly ">
        @foreach ($products as $product)
            <x-product :product="$product" />
        @endforeach
    </div>
@endsection