@extends('layout/mainLayout')

@section('main')
    <div class="block md:flex md:justify-around">
        <div class="md:w-5/12">
            <h1 class="h-style">Prisijungimas</h1>

            <form action="" class="form-style">
                <div class="input-container">
                    <label for="email"><i class="fas fa-envelope"></i> El-Paštas</label>
                    <input type="email" name="email" class="input-style">
                </div>               
                
                <div class="input-container">
                    <label for="password"><i class="fas fa-key"></i> Slaptažodis</label>
                    <input type="password" name="password"  class="input-style"> 
                </div>

                <button class="form-button">Prisijungti</button>
                
            </form>
        </div>

        <div class="md:w-5/12">
            <h1 class="h-style">Registracija</h1>

            <form action="" class="form-style">
                <div class="input-container">
                    <label for="first_name"><i class="fas fa-user"></i> Vardas</label>
                    <input type="text" name="first_name" class="input-style">
                </div>

                <div class="input-container">
                    <label for="last_name"><i class="fas fa-user"></i> Pavardė</label>
                    <input type="text" name="last_name" class="input-style">
                </div>

                <div class="input-container">
                    <label for="email"><i class="fas fa-envelope"></i> El-Paštas</label>
                    <input type="email" name="email" class="input-style">
                </div>

                <div class="input-container">
                    <label for="password"><i class="fas fa-key"></i> Slaptažodis</label>
                    <input type="password" name="password" class="input-style">
                </div>

                <div class="input-container">
                    <label for="repeat_password"><i class="fas fa-key"></i> Pakartokite slaptažodį</label>
                    <input type="password" name="repeat_password" class="input-style">
                </div>

                <button class="form-button">Registruotis</button>
            </form>

        </div>
    </div>

    <p>Kodėl...</p>
@endsection