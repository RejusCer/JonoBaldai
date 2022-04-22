@extends('layout/mainLayout')

@section('main')
<div class="flex justify-around flex-col md:flex-row mr-8">
    <div>
        <h1 class="h-style">Kontaktiniai duomenys</h1>

        <form action="{{ route('order.store') }}" method="POST" class="form-style">
            @csrf
            <div class="input-container">
                <label for="first_name">
                    <i class="fas fa-user"></i> Vardas @error('first_name') <span class="text-red-400">{{ $message }}</span> @enderror 
                </label>
                <input type="text" name="first_name" class="input-style" value="{{ $credentials['firstName'] }}">
            </div>

            <div class="input-container">
                <label for="last_name">
                    <i class="fas fa-user"></i> Pavardė @error('last_name') <span class="text-red-400">{{ $message }}</span> @enderror
                </label>
                <input type="text" name="last_name" class="input-style" value="{{ $credentials['lastName'] }}">
            </div>

            <div class="input-container">
                <label for="email">
                    <i class="fas fa-envelope"></i> El-Paštas @error('email') <span class="text-red-400">{{ $message }}</span> @enderror
                </label>
                <input type="email" name="email" class="input-style" value="{{ $credentials['E-mail'] }}">
            </div>
            
            <div class="input-container">
                <label for="tel">
                    <i class="fas fa-envelope"></i> Telefono numeris @error('tel') <span class="text-red-400">{{ $message }}</span> @enderror
                </label>
                <input type="text" name="tel" class="input-style" value="{{ $credentials['telephoneNr'] }}">
            </div> 

            <div class="input-container">
                <label for="address">
                    <i class="fas fa-envelope"></i> Adresas (Gatvė, namo numeris, aukštas)
                     @error('address') <p class="text-red-400">{{ $message }}</p> @enderror
                </label>
                <input type="text" name="address" class="input-style" value="{{ $credentials['address'] }}">
            </div> 

            <div>
                <p class="font-bold">
                    Mokėjimo būdas @error('first_name') <span class="text-red-400"> Pasirinkite mokėjimo būdą</span> @enderror
                </p>
                <div>
                    <label for="">Grynais (mokėjimas vietoje)</label>
                    <input type="radio" name="payment_type" value="vietoje">
                </div>

                <div>
                    <label for="">Paypal</label>
                    <input type="radio" name="payment_type" value="paypal">
                </div>
            </div>


            <input hidden type="number" name="cart_id" value="{{ $cart_items[0]->cart_id }}">

            <button class="form-button my-8">užsakyti</button>
            
        </form>
    </div>

    <div class="md:w-1/2 w-full">
        <h1 class="h-style">Perkamos prekės</h1>
        <div>
            @foreach ($cart_items as $item)
            <div class="flex flex-col md:flex-row justify-between rounded-2xl bg-secondary m-4 p-4">
                <div class="flex flex-col md:flex-row">
                    <p>
                        <img src="{{ asset($item->product->image) }}" alt="produkto img" class="h-28 mb-2">
                    </p>

                    <div class="md:ml-4">
                        <p class="font-bold text-2xl">{{ $item->product->name }}</p>
                        <p class="font-thin text-gray-500">Kategorija: {{$item->product->category }}</p>
                    </div>
                </div>
                <div class="flex md:flex-col justify-between">
                    <div>
                        <p class="font-bold text-2xl" id="currentPrice"><span id="price-after-discount" data-discount-price="{{ $item->product->price * (1 - $item->product->discount / 100) }}">{{ $item->product->price * (1 - $item->product->discount / 100) }}</span>€</p>
                        <p class="old-price"><span id="old-price">{{ $item->product->price }}</span>€</p>
                    </div>
                    <div class="mt-8">
                        Kiekis: <span id="items-quantity">{{ $item->quantity }}</span>
                    </div>
                </div>
            </div>
            @endforeach

            <div class="flex justify-between rounded-2xl bg-tertiary m-4 p-4">
                <span>Mokėtina suma:</span><span><span class="font-bold" id="total-price">0</span>€</span>
            </div>

        </div>
    </div>
    
</div>

<script>
    const totalPrice = document.getElementById('total-price')
    const PriceAfterDiscount = document.querySelectorAll('#price-after-discount')
    const OldPrice = document.querySelectorAll('#old-price')
    const ItemsQuantity = document.querySelectorAll('#items-quantity')

    for (let i = 0; i < ItemsQuantity.length; i++)
    {
        OldPrice[i].innerText = OldPrice[i].innerText * ItemsQuantity[i].innerText
        PriceAfterDiscount[i].innerText = parseInt(PriceAfterDiscount[i].innerText) * ItemsQuantity[i].innerText
        totalPrice.innerText = parseInt(PriceAfterDiscount[i].innerText) + parseInt(totalPrice.innerText)
    }
</script>
@endsection