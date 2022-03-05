@extends('layout/mainLayout')

@section('main')
    <h1 class="h-style">Krepšelis</h1>

    <div class="flex flex-col md:flex-row gap-8 my-16 md:mx-4">
        <div class="flex-grow-[3]">

            @forelse ($cart_items as $item)
            <div class="bg-secondary mb-4 p-4">
                <div class="flex flex-col md:flex-row justify-between">
                    <div class="flex">
                        <img src="{{ asset($item->product->image) }}" alt="" class="h-28 mb-2">

                        <div class="ml-4">
                            <p class="font-bold text-2xl">{{ $item->product->name }}</p>
                            <p class="font-thin text-gray-500">Kategorija: {{$item->product->category}}</p>
                        </div>
                    </div>
                    <div class="flex md:flex-col justify-between">
                        <div>
                            <p class="font-bold text-2xl">{{ $item->product->price*(1 - $item->product->discount/100) }}€</p>
                            <p class="old-price">{{ $item->product->price }}€</p>
                        </div>
                        <div class="mt-8">
                            <form action="{{ route('destroy', $item->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                            
                            <span class="ml-2 px-1 border-2 rounded-lg border-black">
                                <span class="px-1 hover:bg-black hover:text-white rounded-full">+</span>
                                <span class="borde border-x-2 border-black px-1"> {{$item->quantity}} </span>
                                <span class="px-1 hover:bg-black hover:text-white rounded-full">-</span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            @empty
                Krepšelis tuščias
            @endforelse


            
        </div>

        <div class="bg-tertiary p-4 flex-grow-[1] h-fit">
            <div class="flex justify-between">
                <span>Kaina: </span><span class="font-bold text-2xl">999$</span>
            </div>
            <div class="flex justify-between my-2">
                <span>Sutaupote: </span><span>75$</span>
            </div>
            <form action="{{ route('order') }}">
                <button class="form-button w-full mt-8">Užpildyti užsakymą</button>
            </form>
        </div>
    </div>
@endsection