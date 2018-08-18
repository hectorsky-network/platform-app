@extends('layouts.app')
@section('content')
    <div class="jumbotron jumbotron-fluid home-bar">
        <div class="container">
            <h1 class="display-5">mineWORK</h1>
            <p class="lead">Najlepsza zamknięta platforma modyfikacji do gry Minecraft.</p>
            <div id="myCarousel" class="carousel slide launcher" data-ride="carousel">

                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>

                <div class="carousel-inner" role="listbox">

                    <div class="item active">
                        <img class="first-slide" src="{{ asset('images/launchers/discover.png') }}" alt="First Slide" style="">
                    </div>

                    <div class="item">
                        <img class="second-slide" src="{{ asset('images/launchers/packs.png') }}" alt="Second Slide">
                    </div>

                    <div class="item">
                        <img class="second-slide" src="{{ asset('images/launchers/options.png') }}" alt="Third Slide">
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="jumbotron jumbotron-fluid" style="margin-top:-29px;">
        <div class="container">
            <h1 class="display-5">Kurka na co jeszcze czekasz?</h1>
            <p class="lead">Zarejestruj się, już teraz i pobierz nasz Launcher i wkrocz do świata nieskończonych możliwości.</p>
            <a href="{{ route('register') }}"><button type="button" class="btn btn-danger">Dołącz do naszej platformy już teraz!</button></a> <a href="{{ route('modpacks') }}"><button type="button" class="btn btn-success">Jesteś już na pokładzie? Przejrzyj paczki modyfikacji.</button></a>
        </div>
    </div>

@endsection