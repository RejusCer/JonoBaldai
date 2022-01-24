@extends('layout/mainLayout')

@section('main')
    {{-- Jei ekranas mažas: kategorijas rodys pagrindiniame lauke --}}
    <div class="flex flex-wrap justify-evenly md:hidden mt-8 ">
        <a href="#" class="category-container"><i class="fas fa-align-justify"></i> <p class="ml-1">Kėdės</p></a>
        <a href="#" class="category-container"><i class="fas fa-archive"></i> <p class="ml-1">Komodos</p></a>
        <a href="#" class="category-container"><i class="fas fa-align-justify"></i> <p class="ml-1">Spintos</p></a>
        <a href="#" class="category-container"><i class="fas fa-wrench"></i> <p class="ml-1">Įrankiai</p></a>
        <a href="#" class="category-container"><i class="fas fa-align-justify"></i> <p class="ml-1">Stalai</p></a>
        <a href="#" class="category-container"><i class="fas fa-credit-card"></i> <p class="ml-1">su akcija</p></a>
    </div>
@endsection