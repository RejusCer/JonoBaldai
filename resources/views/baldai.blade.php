@extends('layout/mainLayout')

@section('main')

    <h1 class="h-style">{{ count($products) == 0 ? "Tuščia": $products[0]->category; }}</h1>

    <div class="flex flex-wrap justify-evenly ">
        @foreach ($products as $product)
            <x-product :product="$product" />
        @endforeach
    </div>
@endsection