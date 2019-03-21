@extends('layouts.app')

@section('content')
    <div class="jumbotron jumbotron-fluid settings-bar">
        <div class="container">
            <h1 class="display-3">Weryfikacja E-Mail</h1>
            <p class="lead">Aby móc w pełni korzystać z możliwościu serwisu, musisz zweryfikować swój adres E-Mail.</p>
        </div>
    </div>
    <div class="container" style="margin-top: -55px;">
        <div class="row">
            @include('user.layouts.menu')
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">{{ __('Zweryfikuj swój adres E-Mail') }}</div>

                <div class="panel-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Świerzutki link weryfikacyjny został właśnie wsyłany na twoją skrzynkę!') }}
                        </div>
                    @endif

                    {{ __('Przed kontynuowaniem sprawdź, czy dostałeś link weryfikacjny na swoją skrzynkę E-Mail') }}<br>
                    {{ __('Jeśli nie otrzymałeś/aś wiadomości z linkiem werfyikacyjnym:') }}<br><br>
                      <center> <a class="btn btn-lg btn-danger" href="{{ route('verification.resend') }}">{{ __('Kliknij tutaj aby wysłać następny') }}</a></center>
                </div>
            </div>
        </div>
        </div>
    </div>
@endsection
