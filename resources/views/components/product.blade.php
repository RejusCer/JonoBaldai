@props(['product' => $product])

<div class="flex flex-col py-4 my-4 border-2 border-primary rounded-lg">
    <div class="m-auto">
        <a href="{{route('details', $product)}}">
            <img class="h-44" src="{{ asset($product->image) }}" alt="Nuotrauka">
        </a>
    </div>
    <p class="m-2 max-w-[14rem]">{{ $product->name }}</p>
    <div class="flex justify-between pt-8 m-2">
        <div class="pr-4">
            <p class="font-bold text-2xl" id="currentPrice">{{ $product->price * (1 - $product->discount / 100) }}€</p>
            <p class="old-price">{{ $product->price }}€</p>
        </div>
        <div>
            @if ($product->isProductInCart)
            <form action="{{ route('cart') }}" method="GET" class="inline">
                <button class="item-buttons-activated">Pirkti</button>
            </form>
            @else
            <form action="{{ route('cartStore', $product) }}" method="POST" class="inline">
                @csrf
                <button class="item-buttons">Į krepšelį</button>
            </form>
            @endif

            @if ($product->isProductInWish)
                <form action="{{ route('wishList') }}" method="GET" class="inline">
                    <button class="item-buttons-activated">Norai</button>
                </form>
            @else
            <form action="{{ route('wishStore', $product) }}" method="POST" class="inline">
                @csrf
                <button class="item-buttons">Noriu</button>
            </form>
            @endif
        </div>
    </div>
</div>

