@extends('layout/mainLayout')

@section('main')
    <div class="flex flex-col md:flex-row justify-between my-16 md:mx-4">
        <div class="md:w-1/2 p-4">
            <img src="{{ asset($product->image) }}" alt="Products image" class="h-full m-auto">
        </div>

        <div class="md:w-1/2 bg-tertiary rounded-lg p-4 flex flex-col justify-between">
            <div>
                <p class="font-bold text-4xl">{{ $product->name }}</p>
                <p>kategorija: {{ $product->category }}</p>

                <p class="my-4">
                    <span class="font-bold text-3xl" id="currentPrice">{{ $product->price * (1 - $product->discount / 100) }}€</span> 
                    <span class="old-price">{{ $product->price }}€</span>
                </p>
            </div>

            <div class="flex justify-between md:inline">
                @if ($product->isProductInCart)
                <form action="{{ route('cart') }}" method="GET" class="inline">
                    <button class="item-buttons-activated"><i class="fas fa-euro-sign"></i> Pirkti</button>
                </form>
                @else
                <form action="{{ route('cartStore', $product) }}" method="POST" class="inline">
                    @csrf
                    <button class="form-button mr-4"><i class="fas fa-shopping-cart"></i> Į krepšelį</button>
                </form>
                @endif

                @if ($product->isProductInWish)
                <form action="{{ route('wishList') }}" method="GET" class="inline">
                    <button class="item-buttons-activated"><i class="fas fa-heart"></i> Norai</button>
                </form>
                @else
                <form action="{{ route('wishStore', $product) }}" method="POST" class="inline">
                    @csrf
                    <button class="form-button"><i class="fas fa-heart"></i> Norių</button>
                </form>
                @endif
            </div>
        </div>
    </div>

    <div>
        <p class="h-style">Išmatavimai</p>
        <table class="m-8">
            <tr>
                <td class="pr-16 font-bold">Aukštis</td>
                <td>{{ $product->heigth }} cm</td>
            </tr>
            <tr>
                <td class="pr-16 font-bold">Plotis</td>
                <td>{{ $product->width }} cm</td>
            </tr>
            <tr>
                <td class="pr-16 font-bold">Ilgis</td>
                <td>{{ $product->length }} cm</td>
            </tr>
            <tr>
                <td class="pr-16 font-bold">Svoris</td>
                <td>{{ $product->weight }} kg</td>
            </tr>
        </table>
    </div>

    <div class="mb-48">
        <p class="h-style">Papildoma informacija</p>
        <p class="m-8">
            Lorem ipsum dolor sit amet consectetur 
            a tempora sint corrupti quidem nulla quos ipsa.
        </p>
    </div>

@endsection