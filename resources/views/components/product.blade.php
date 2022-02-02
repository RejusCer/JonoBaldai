@props(['product' => $product])

<div class="flex flex-col py-4 my-4 border-2 border-primary rounded-lg">
    <div>
        <img class="w-full" src="{{ asset($product->image) }}" alt="Nuotrauka">
    </div>
    <p class="m-2 max-w-[14rem]">{{ $product->name }}</p>
    <div class="flex justify-between pt-8 m-2">
        <p class="font-bold text-2xl">{{ $product->price }}€</p>
        <div>
            <form action="" class="inline">
                <button class="item-buttons">Į krepšelį</button>
            </form>
            <button class="item-buttons">Noriu</button>
        </div>
    </div>
</div>