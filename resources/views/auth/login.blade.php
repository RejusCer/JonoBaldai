@extends('layout/mainLayout')

@section('main')
    <div class= "m-auto w-auto">

        <h1 class="h-style">Prisijungimas</h1>

        <form action="{{ route('login') }}" method="POST" class="form-style">
            @csrf
            <div class="input-container">
                @if (session('status'))
                    <span class="text-red-400">{{ session('status') }}</span>
                @endif
            </div>
            
            <div class="input-container">
                <label for="email"><i class="fas fa-envelope"></i> El-Paštas</label>
                @error('email')
                    <span class="text-red-400">{{ $message }}</span>
                @enderror
                <input type="email" name="email" class="input-style">
            </div>               
            
            <div class="input-container">
                <label for="password"><i class="fas fa-key"></i> Slaptažodis</label>
                @error('password')
                    <span class="text-red-400">{{ $message }}</span>
                @enderror
                <input type="password" name="password"  class="input-style"> 
            </div>

            <button class="form-button">Prisijungti</button>
            <a href="{{ route('registration') }}" class="form-button">Neturiu paskyros</a>
            
        </form>


        
    </div>
@endsection