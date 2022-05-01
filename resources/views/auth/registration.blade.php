@extends('layout/mainLayout')

@section('main')
    <div class="w-auto m-auto">
        <h1 class="h-style">Registracija</h1>

        <form action="{{ route('registration') }}" method="POST" class="form-style">
            @csrf
            <div class="input-container">
                @if (session('status'))
                    <span class="text-red-400">{{ session('status') }}</span>
                @endif
            </div>

            <div class="input-container">
                <label for="first_name"><i class="fas fa-user"></i> Vardas</label>
                @error('first_name')
                    <span class="text-red-400">{{ $message }}</span>
                @enderror
                <input type="text" name="first_name" class="input-style" value="{{ old('first_name') }}">
            </div>

            <div class="input-container">
                <label for="last_name"><i class="fas fa-user"></i> Pavardė</label>
                @error('last_name')
                    <span  class="text-red-400">{{ $message }}</span>
                @enderror
                <input type="text" name="last_name" class="input-style" value="{{ old('last_name') }}">
            </div>

            <div class="input-container">
                <label for="email"><i class="fas fa-envelope"></i> El-Paštas</label>
                @error('email')
                    <span  class="text-red-400">{{ $message }}</span>
                @enderror
                <input type="email" name="email" class="input-style" value="{{ old('email') }}">
            </div>

            <div class="input-container">
                <label for="password"><i class="fas fa-key"></i> Slaptažodis</label>
                @error('password')
                    <span  class="text-red-400">{{ $message }}</span>
                @enderror
                <input type="password" name="password" class="input-style">
            </div>

            <div class="input-container">
                <label for="password_confirmation"><i class="fas fa-key"></i> Pakartokite slaptažodį</label>
                <input type="password" name="password_confirmation" class="input-style">
            </div>

            <button class="form-button">Registruotis</button>
        </form>
    </div>

@endsection