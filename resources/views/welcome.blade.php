@extends('layouts.app')
@section('content')
    <div class="jumbotron home-bar">
        <div class="container">
            <h1 class="display-5">{{env("APP_NAME")}}</h1>
            <p class="lead">Najlepsza zamknięta platforma z paczkami modyfikacji.</p>
            <div id="launcherCarousel" class="carousel slide launcher" data-ride="carousel">

                <ol class="carousel-indicators">
                    <li data-target="#launcherCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#launcherCarousel" data-slide-to="1"></li>
                    <li data-target="#launcherCarousel" data-slide-to="2"></li>
                </ol>

                <div class="carousel-inner" role="listbox">

                    <div class="item active">
                        <img class="first-slide" src="{{ asset('images/launchers/packs.png') }}" alt="First Slide" style="">
                    </div>

                    <div class="item">
                        <img class="second-slide" src="{{ asset('images/launchers/packoptions.png') }}" alt="Second Slide">
                    </div>

                    <div class="item">
                        <img class="second-slide" src="{{ asset('images/launchers/options.png') }}" alt="Third Slide">
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="jumbotron" style="margin-top:-29px; text-align:center;">
        <div class="container">
            <h1 class="display-5">Kurde faja, na co jeszcze czekasz?</h1>
            <p class="lead">Zarejestruj się, już teraz i pobierz nasz Launcher i wkrocz do świata nieskończonych możliwości.</p>
            <a href="{{ route('register') }}"><button type="button" class="btn btn-danger">Dołącz do naszej platformy już teraz!</button></a> <a href="{{ route('modpacks') }}"><button type="button" class="btn btn-success">Jesteś już na pokładzie? Przejrzyj paczki modyfikacji.</button></a>
        </div>
    </div>

@endsection