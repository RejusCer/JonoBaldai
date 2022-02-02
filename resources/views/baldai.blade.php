@extends('layout/mainLayout')

@section('main')

    <h1 class="h-style">{{ count($products) == 0 ? "tuščia": $products[0]->category; }}</h1>

    <div class="flex flex-wrap justify-evenly ">
        @forelse ($products as $product)
            <x-product :product="$product" />
        @empty
            <p>Nėra prekių</p>
        @endforelse
    </div>
@endsection