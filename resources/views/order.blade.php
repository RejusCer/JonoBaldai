@extends('layout/mainLayout')

@section('main')
    <div>
        <h1 class="h-style">Kontaktiniai duomenys</h1>

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
                <label for="tel"><i class="fas fa-envelope"></i> Telefono numeris</label>
                <input type="email" name="tel" class="input-style">
            </div> 

            <div class="input-container">
                <label for="address"><i class="fas fa-envelope"></i> Adresas (Gatvė, namo numeris, aukštas)</label>
                <input type="email" name="address" class="input-style">
            </div> 

            <div>
                <p class="font-bold">Mokėjimo būdas</p>
                <div>
                    <label for="">Grynais (mokėjimas vietoje)</label>
                    <input type="radio" name="payment_type">
                </div>

                <div>
                    <label for="">Paypal</label>
                    <input type="radio" name="payment_type">
                </div>
            </div>

            <button class="form-button my-8">užsakyti</button>
            
        </form>
    </div>
@endsection