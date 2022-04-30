@extends('layout/mainLayout')

@section('main')
    <div class="w-auto m-auto form-style">
        <h1 class="h-style">Ar tikrai norite ištrinti paskyrą?</h1>

        <form action="{{ route('user.delete', auth()->user()->id) }}" method="POST">
            @csrf
            @method('DELETE')

            <div class="input-container">
                @if (session('status'))
                    <span class="text-red-400">{{ session('status') }}</span>
                @endif
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

            <button class="form-button">Ištrinti paskyrą</button>
        </form>

    </div>

@endsection