@extends('layout/mainLayout')

@section('main')
    {{-- Jei ekranas mažas: kategorijas rodys pagrindiniame lauke --}}
    <div class="flex flex-wrap justify-evenly md:hidden mt-8 ">
        <a href="{{ route('baldai', 'kede') }}" class="category-container"><i class="fas fa-align-justify"></i> <p class="ml-1">Kėdės</p></a>
        <a href="{{ route('baldai', 'kede') }}" class="category-container"><i class="fas fa-archive"></i> <p class="ml-1">Komodos</p></a>
        <a href="{{ route('baldai', 'kede') }}" class="category-container"><i class="fas fa-align-justify"></i> <p class="ml-1">Spintos</p></a>
        <a href="{{ route('baldai', 'kede') }}" class="category-container"><i class="fas fa-wrench"></i> <p class="ml-1">Įrankiai</p></a>
        <a href="{{ route('baldai', 'kede') }}" class="category-container"><i class="fas fa-align-justify"></i> <p class="ml-1">Stalai</p></a>
        <a href="{{ route('baldai', 'kede') }}" class="category-container"><i class="fas fa-credit-card"></i> <p class="ml-1">su akcija</p></a>
    </div>

    <div class="p-4">
        <div>
            <h1 class="font-bold text-2xl md:text-4xl">Top Pasiūlymai</h1>

            <div class="flex flex-wrap justify-evenly ">
                <div class="flex flex-col py-4 my-4 border-2 border-primary rounded-lg">
                    <div>
                        <img class="w-full" src="{{ asset("img/kede.jpg") }}" alt="Nuotrauka">
                    </div>
                    <p class="m-2 max-w-[14rem]">Prekės pavadinimas</p>
                    <div class="flex justify-between pt-8 m-2">
                        <p class="font-bold text-2xl">8$</p>
                        <div>
                            <button class="item-buttons">Į krepšelį</button>
                            <button class="item-buttons">Noriu</button>
                        </div>
                    </div>
                </div>

                

                
            </div>
        </div>

        <hr>

        <div class="p-4">
            <h1 class="font-bold text-2xl md:text-4xl">Nauji pasiūlymai</h1>

            <div class="flex flex-wrap justify-evenly ">
                <div class="flex flex-col py-4 my-4 border-2 border-primary rounded-lg">
                    <div>
                        <img class="w-full" src="{{ asset("img/kede.jpg") }}" alt="Nuotrauka">
                    </div>
                    <p class="m-2 max-w-[14rem]">Prekės pavadinimas</p>
                    <div class="flex justify-between pt-8 m-2">
                        <p class="font-bold text-2xl">8$</p>
                        <div>
                            <button class="item-buttons">Į krepšelį</button>
                            <button class="item-buttons">Noriu</button>
                        </div>
                    </div>
                </div>

                

                

                
            </div>
        </div>

        <hr>

        <div class="p-4">
            <h1 class="font-bold text-2xl md:text-4xl">Išpardavimai</h1>

            <div class="flex flex-wrap justify-evenly ">
                <div class="flex flex-col py-4 my-4 border-2 border-primary rounded-lg">
                    <div>
                        <img class="w-full" src="{{ asset("img/kede.jpg") }}" alt="Nuotrauka">
                    </div>
                    <p class="m-2 max-w-[14rem]">Prekės pavadinimas</p>
                    <div class="flex justify-between pt-8 m-2">
                        <p class="font-bold text-2xl">8$</p>
                        <div>
                            <button class="item-buttons">Į krepšelį</button>
                            <button class="item-buttons">Noriu</button>
                        </div>
                    </div>
                </div>

                

                
            </div>
        </div>
    </div>
@endsection