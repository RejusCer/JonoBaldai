@extends('layout/mainLayout')

@section('main')
    @forelse ($Wishlist_items as $wish_item)
    <div class="bg-secondary mb-4 p-4">
        <div class="flex flex-col md:flex-row justify-between">
            <div class="flex">
                <img src="{{ asset($wish_item->Product->image) }}" alt="" class="h-28 mb-2">

                <div class="ml-4">
                    <p class="font-bold text-2xl">{{ $wish_item->Product->name }}</p>
                    <p class="font-thin text-gray-500">Kategorija: {{ $wish_item->Product->category }}</p>
                </div>
            </div>
            <div class="flex md:flex-col justify-between">
                <div>
                    <p class="font-bold text-2xl" id="currentPrice">{{ $wish_item->Product->price * (1 - $wish_item->Product->discount / 100) }}€</p>
                    <p class="old-price">{{ $wish_item->Product->price }}€</p>
                </div>
                <div class="mt-8">
                    <form action="{{ route('wish.destroy', $wish_item) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @empty
        Nėra norų
    @endforelse

@endsection