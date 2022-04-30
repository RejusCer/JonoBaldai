@extends('layout/mainLayout')

@section('main')

    <script src="{{ asset('js/order_prices.js') }}" defer></script>

    @forelse ($Orders as $order)
    <div class="bg-secondary mb-4 p-4" id="order" data-order-id="{{$order->id}}">

        <div class="flex justify-between border-black border-2 m-2 p-2 rounded-lg">
            <p class="font-bold">statusas: {{ $order->status }}</p>
            
            <p class="font-bold">Mokėjimo būdas: {{ $order->payment }}</p>

            <p class="font-bold">Kada užsakytas: {{ $order->created_at }}</p>
        </div>

        <div>
            @forelse ($order->Order_item as $item)
            <div class="bg-secondary mb-4 p-4 border-black border-b-2">
                <div class="flex flex-col md:flex-row justify-between">
                    <div class="flex">
                        <img src="{{ asset($item->Product->image) }}" alt="" class="h-28 mb-2">
        
                        <div class="ml-4">
                            <p class="font-bold text-2xl">{{ $item->Product->name }}</p>
                            <p class="font-thin text-gray-500">Kategorija: {{ $item->Product->category }}</p>
                        </div>
                    </div>
                    <div class="flex md:flex-col justify-between">
                        <div>
                            <p class="font-bold text-2xl"><span id="currentPrice">{{ $item->Product->price * (1 - $item->Product->discount / 100) }}</span>€</p>
                            <p class="old-price">{{ $item->Product->price }}€</p>
                        </div>
                        <div class="mt-8">
                            kiekis: <span id="item-quantity">{{ $item->quantity }}</span>
                        </div>
                    </div>
                </div>
            </div>
            @empty
                Nėra norų
            @endforelse
        </div>

        <div class="text-2xl">
            Total: <span class="font-bold"><span id="order-total">0</span>€</span>
        </div>

    </div>
    @empty
        Nėra norų
    @endforelse



@endsection