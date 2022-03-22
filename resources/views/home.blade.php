@extends('layout/mainLayout')

@section('main')
    {{-- Jei ekranas mažas: kategorijas rodys pagrindiniame lauke --}}
    <div class="flex flex-wrap justify-evenly md:hidden mt-8 ">
        <a href="{{ route('baldai', 'kedes') }}" class="category-container"><i class="fas fa-align-justify"></i> <p class="ml-1">Kėdės</p></a>
        <a href="{{ route('baldai', 'komodos') }}" class="category-container"><i class="fas fa-archive"></i> <p class="ml-1">Komodos</p></a>
        <a href="{{ route('baldai', 'spintos') }}" class="category-container"><i class="fas fa-align-justify"></i> <p class="ml-1">Spintos</p></a>
        <a href="{{ route('baldai', 'irankiai') }}" class="category-container"><i class="fas fa-wrench"></i> <p class="ml-1">Įrankiai</p></a>
        <a href="{{ route('baldai', 'stalai') }}" class="category-container"><i class="fas fa-align-justify"></i> <p class="ml-1">Stalai</p></a>
        <a href="{{ route('baldai', 'akcijos') }}" class="category-container"><i class="fas fa-credit-card"></i> <p class="ml-1">su akcija</p></a>
    </div>

    <div class="p-4">
        <div>
            <h1 class="h-style">Top Pasiūlymai</h1>

            <div class="flex flex-wrap justify-evenly ">
                @forelse ($topOffers as $product)
                <x-product :product="$product" />
                @empty
                    Nėra prekių
                @endforelse
            </div>
        </div>

        <hr>

        <div class="p-4">
            <h1 class="h-style">Nauji pasiūlymai</h1>

            <div class="flex flex-wrap justify-evenly ">
                @forelse ($newOffers as $product)
                <x-product :product="$product" />
                @empty
                    Nėra prekių
                @endforelse                
            </div>
        </div>

        <hr>

        <div class="p-4">
            <h1 class="font-bold text-2xl md:text-4xl">Išpardavimai</h1>

            <div class="flex flex-wrap justify-evenly ">
                @forelse ($discountOffers as $product)
                <x-product :product="$product" />
                @empty
                    Nėra prekių
                @endforelse  
            </div>
        </div>
    </div>
@endsection