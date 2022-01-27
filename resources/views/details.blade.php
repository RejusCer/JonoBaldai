@extends('layout/mainLayout')

@section('main')
    <div class="flex flex-col md:flex-row justify-between my-16 md:mx-4">
        <div class="md:w-1/2 p-4">
            <img src="{{ asset('img/kede.jpg') }}" alt="" class="h-full m-auto">
        </div>

        <div class="md:w-1/2 bg-tertiary rounded-lg p-4 flex flex-col justify-between">
            <div>
                <p class="font-bold text-4xl">Kede</p>
                <p>kategorija: kede</p>

                <p class="my-4"><span class="font-bold text-3xl">845€</span> <span class="old-price">999€</span></p>
            </div>

            <div class="flex justify-between md:inline">
                <button class="form-button mr-4"><i class="fas fa-shopping-cart"></i> Į krepšelį</button>
                <button class="form-button"><i class="fas fa-heart"></i> Norių</button>
            </div>
        </div>
    </div>

    <div>
        <p class="h-style">Išmatavimai</p>
        <table class="m-8">
            <tr>
                <td class="pr-16 font-bold">Aukštis</td>
                <td>74cm</td>
            </tr>
            <tr>
                <td class="pr-16 font-bold">Plotis</td>
                <td>45cm</td>
            </tr>
            <tr>
                <td class="pr-16 font-bold">Ilgis</td>
                <td>77cm</td>
            </tr>
            <tr>
                <td class="pr-16 font-bold">Svoris</td>
                <td>5kg</td>
            </tr>
        </table>
    </div>

    <div class="mb-48">
        <p class="h-style">Papildoma informacija</p>
        <p class="m-8">
            Lorem ipsum dolor sit amet consectetur 
            a tempora sint corrupti quidem nulla quos ipsa.
        </p>
    </div>
@endsection