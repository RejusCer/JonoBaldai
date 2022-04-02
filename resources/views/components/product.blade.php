@props(['product' => $product])

<div class="flex flex-col py-4 my-4 border-2 border-primary rounded-lg">
    <div>
        <img class="w-full" src="{{ asset($product->image) }}" alt="Nuotrauka">
    </div>
    <p class="m-2 max-w-[14rem]">{{ $product->name }}</p>
    <div class="flex justify-between pt-8 m-2">
        <p class="font-bold text-2xl">{{ $product->price }}€</p>
        <div>
            @if ($product->isProductInCart)
            <form action="{{ route('cart') }}" method="GET" class="inline">
                <button class="p-2 border-2 border-green-700 text-green-700 rounded-lg hover:bg-green-700 hover:text-white">Pirkti</button>
            </form>
            @else
            <form action="{{ route('cartStore', $product) }}" method="POST" class="inline">
                @csrf
                <button class="item-buttons">Į krepšelį</button>
            </form>
            @endif

            @if ($product->isProductInWish)
                <form action="{{ route('wishList') }}" method="GET" class="inline">
                    <button class="p-2 border-2 border-green-700 text-green-700 rounded-lg hover:bg-green-700 hover:text-white">Norai</button>
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