@extends('layouts.app')
@section('content')
    <div class="jumbotron jumbotron-fluid launcher-bar">
        <div class="container">
            <h1 class="display-5">Poznaj nasz launcher!</h1>
            <p class="lead">No może nie nasz, ale równie dobrze działający. :-)</p>
            <div id="launcherCarousel" class="carousel slide launcher" data-ride="carousel">

                <ol class="carousel-indicators">
                    <li data-target="#launcherCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#launcherCarousel" data-slide-to="1"></li>
                    <li data-target="#launcherCarousel" data-slide-to="2"></li>
                </ol>

                <div class="carousel-inner" role="listbox">

                    <div class="item active">
                        <img class="first-slide" src="{{ asset('images/launchers/packs.png') }}" alt="First Slide">
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
    <div class="jumbotron jumbotron-fluid" style="margin-top:-29px; text-align:center;">
        <div class="container">
            <h1 class="display-5">Pobierz już teraz!</h1>
            <p class="lead">Nasz launcher jest dostępny na wszystkie wiodące platformy.</p>

            <a href="#"><button type="button" class="btn-lg btn-primary"><i class="fa fa-windows"></i> Microsoft Windows (.exe)</button></a>
            <a href="#"><button type="button" class="btn-lg btn-success"><i class="fa fa-apple"></i> Apple macOS (.app)</button></a>
            <a href="#"><button type="button" class="btn-lg btn-danger"><i class="fa fa-linux"></i> Linux/Inne (.jar)</button></a>
        </div>
    </div>
@endsection