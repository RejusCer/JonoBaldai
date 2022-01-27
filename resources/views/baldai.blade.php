@extends('layout/mainLayout')

@section('main')

    <h1 class="h-style">@php echo $category @endphp</h1>

    <div class="flex flex-wrap justify-evenly ">
        <div class="flex flex-col py-4 my-4 border-2 border-primary rounded-lg">
            <div>
                <img class="w-full" src="{{ asset("img/kede.jpg") }}" alt="Nuotrauka">
            </div>
            <p class="m-2 max-w-[14rem]">Prekės pavadinimas</p>
            <div class="flex justify-between pt-8 m-2">
                <p class="font-bold text-2xl">8€</p>
                <div>
                    <button class="item-buttons">Į krepšelį</button>
                    <button class="item-buttons">Noriu</button>
                </div>
            </div>
        </div>

        

        
    </div>
@endsection