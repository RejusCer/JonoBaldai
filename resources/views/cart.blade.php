@extends('layout/mainLayout')

@section('main')
    <h1 class="h-style">Krepšelis</h1>

    <div class="flex flex-col md:flex-row gap-8 my-16 md:mx-4">
        <div class="flex-grow-[3]">

            @forelse ($cart_items as $item)
            <div class="bg-secondary mb-4 p-4" id="item-{{$item->id}}">
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
                            <p class="font-bold text-2xl">
                            <span id="discountPrice" 
                            data-discount-price="{{ $item->product->price *(1 - $item->product->discount/100) }}">
                                {{ $item->product->price *(1 - $item->product->discount/100) }}
                            </span> €
                            </p>
                            
                            <p class="old-price"> 
                            <span   id="oldPrice" data-old-price="{{ $item->product->price }}">
                                {{ $item->product->price }}
                            </span> €
                            </p>
                            
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
                                <span class="px-1 hover:bg-black hover:text-white rounded-full" id="increment">+</span>
                                <span class="borde border-x-2 border-black px-1" id="quantity" data-item-id="{{ $item->id }}">
                                    {{$item->quantity}}
                                </span>
                                <span class="px-1 hover:bg-black hover:text-white rounded-full" id="decrement">-</span>
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
                <span>Kaina: </span><span class="font-bold text-2xl"><span id="finalPrice">0</span> $</span>
            </div>
            <div class="flex justify-between my-2">
                <span>Sutaupote: </span><span><span id="youSave">0</span> $</span>
            </div>
            <form action="{{ route('order') }}">
                <button class="form-button w-full mt-8">Užpildyti užsakymą</button>
            </form>
        </div>
    </div>

    <script>
        const increments = document.querySelectorAll('#increment')
        const decrements = document.querySelectorAll('#decrement')
        const quantitys = document.querySelectorAll('#quantity')
        const discountPrices = document.querySelectorAll('#discountPrice')
        const oldPrices = document.querySelectorAll('#oldPrice')
        const finalPrice = document.getElementById('finalPrice')
        const youSave = document.getElementById('youSave')


        updateFinalPrice()

        for (let i = 0; i < quantitys.length; i++) 
        {
            if (oldPrices[i].dataset.oldPrice == discountPrices[i].dataset.discountPrice)
            {
                oldPrices[i].style.display = 'none'
            }

            increments[i].addEventListener('click', function(){
                if (quantitys[i].innerText < 10)
                {
                    // vienetų skaičiaus nustatymas
                    quantitys[i].innerText = (parseInt(quantitys[i].innerText) + 1) + ''
                    // kaina po nuolaidos
                    discountPrices[i].innerText = parseInt(discountPrices[i].dataset.discountPrice) * parseInt(quantitys[i].innerText)
                    // kaina prieš nuolaidą
                    oldPrices[i].innerText = parseInt(oldPrices[i].dataset.oldPrice) * parseInt(quantitys[i].innerText)
                    
                    updateFinalPrice()
                }
                
                // ajax'as neveikia naujausiose laravel 8 versijose, gaunu error 500, kodėl taip yra mano galva nebeišneša, 
                // bandžiau begalę dalykų problemą išspręsti, bet dėja nepavyko
                // pisausi jau 3 dienas, mano protas tokio dalyko nebegali pavežti, esu pasiekęs tokia stadiją 
                // kur man reikia dievo pagalbos arba varyti į Amsterdamą grybus uostyt
                // $.ajax({
                //     url: "{{ route('increment') }}",
                //     type: 'GET',
                //     data: {itemId: quantitys[i].dataset.itemId},
                //     success: function(result){
                //         $('item-' + quantitys[i].dataset.itemId).html(result)
                //     },
                // })
            })
        
            decrements[i].addEventListener('click', function(){
                if (quantitys[i].innerText > 1 )
                {
                    quantitys[i].innerText = (parseInt(quantitys[i].innerText) - 1) + ''
                    discountPrices[i].innerText = parseInt(discountPrices[i].dataset.discountPrice) * parseInt(quantitys[i].innerText)
                    oldPrices[i].innerText = parseInt(oldPrices[i].dataset.oldPrice) * parseInt(quantitys[i].innerText)
                    
                    updateFinalPrice()
                }
            })
        }

        function updateFinalPrice()
        {
            finalPrice.innerText = 0
            youSave.innerText = 0
            for (let i = 0; i < quantitys.length; i++) 
            {
                finalPrice.innerText = parseInt(finalPrice.innerText) + 
                    parseInt(discountPrices[i].dataset.discountPrice) * quantitys[i].innerText

                youSave.innerText = parseInt(youSave.innerText) + 
                    parseInt(oldPrices[i].dataset.oldPrice) * quantitys[i].innerText
            }
            youSave.innerText = youSave.innerText - finalPrice.innerText
        }
    </script>
@endsection