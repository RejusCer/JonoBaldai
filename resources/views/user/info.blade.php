@extends('layout/mainLayout')

@section('main')
    <div class="w-auto m-auto form-style">
        <h1 class="h-style">Vartotojo informacija</h1>

        <form action="{{ route('user.change', $user->id) }}" method="POST">
            @csrf
            <div class="input-container">
                @if (session('status'))
                    <span class="text-green-400">{{ session('status') }}</span>
                @endif
            </div>

            <div class="input-container">
                <label for="first_name"><i class="fas fa-user"></i> Vardas</label>
                @error('first_name')
                    <span class="text-red-400">{{ $message }}</span>
                @enderror
                <input type="text" name="first_name" class="input-style" value="{{ $user->first_name }}">
            </div>

            <div class="input-container">
                <label for="last_name"><i class="fas fa-user"></i> Pavardė</label>
                @error('last_name')
                    <span  class="text-red-400">{{ $message }}</span>
                @enderror
                <input type="text" name="last_name" class="input-style" value="{{ $user->last_name }}">
            </div>

            <div class="input-container">
                <label for="email"><i class="fas fa-envelope"></i> El-Paštas</label>
                @error('email')
                    <span  class="text-red-400">{{ $message }}</span>
                @enderror
                <input type="email" name="email" class="input-style" value="{{ $user->email }}">
            </div>

            <div class="input-container">
                <label for="tel_number"><i class="fas fa-user"></i> Telefono numeris</label>
                @error('tel_number')
                    <span  class="text-red-400">{{ $message }}</span>
                @enderror
                <input type="text" name="tel_number" class="input-style" value="{{ $user->tel_number }}">
            </div>

            <div class="input-container">
                <label for="address"><i class="fas fa-user"></i> adresas</label>
                @error('address')
                    <span  class="text-red-400">{{ $message }}</span>
                @enderror
                <input type="text" name="address" class="input-style" value="{{ $user->address }}">
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

            <button class="form-button">Pakeisti duomenys</button>
        </form>
        <form action="{{ route('user.delete', $user->id) }}" method="GET">
            <button class="form-button">Ištrinti paskyrą</button>
        </form>
    </div>

@endsection