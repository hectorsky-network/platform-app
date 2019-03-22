@extends('layouts.app')
@section('content')
    <div class="jumbotron jumbotron-fluid settings-bar">
        <div class="container">
            <h1 class="display-3">Wiele urządzeń</h1>
            <p class="lead">Tutaj możesz zarządzać swoimi tokenami dostępu.</p>
        </div>
    </div>
    <div class="container" style="margin-top: -55px;">
        <div class="row">
            @include('user.layouts.menu')
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">Lista twoich urządzeń <a class="btn btn-danger btn-sm" style="float:right; margin-top:-5px;" href="{{ route('user.tokens.invalidate','all' )}}">UNIEWAŻNIJ WSZYSTKIE TOKENY</a></div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-info" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <p>W tym miejscu możesz zarządzać swoimi autoryzowanymi automatycznimi logowaniami na konto.</p>
                            <table class="table table-sm table-striped table-responsive-3">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Token Klienta</th>
                                    <th>Token Dostępu</th>
                                    <th>Zarządzanie</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        @if(App\AuthServer::where('id',Auth::user()->id)->value('client_token') === NULL)
                                            <td>Brak</td>
                                        @else
                                            <td>{{ App\AuthServer::where('id',Auth::user()->id)->value('client_token') }}</td>
                                        @endif
                                        @if(App\AuthServer::where('id',Auth::user()->id)->value('access_token') === NULL)
                                            <td>Brak</td>
                                        @else
                                            <td>{{ App\AuthServer::where('id',Auth::user()->id)->value('access_token') }}</td>
                                        @endif
                                        <td><a class="btn btn-danger btn-xs" href="{{ route('user.tokens.invalidate',1 )}}">UNIEWAŻNIJ</a></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        @if(App\AuthServer::where('id',Auth::user()->id)->value('client_token_2') === NULL)
                                            <td>Brak</td>
                                        @else
                                            <td>{{ App\AuthServer::where('id',Auth::user()->id)->value('client_token_2') }}</td>
                                        @endif
                                        @if(App\AuthServer::where('id',Auth::user()->id)->value('access_token_2') === NULL)
                                            <td>Brak</td>
                                        @else
                                            <td>{{ App\AuthServer::where('id',Auth::user()->id)->value('access_token_2') }}</td>
                                        @endif
                                        <td><a class="btn btn-danger btn-xs" href="{{ route('user.tokens.invalidate',2 )}}">UNIEWAŻNIJ</a></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        @if(App\AuthServer::where('id',Auth::user()->id)->value('client_token_3') === NULL)
                                            <td>Brak</td>
                                        @else
                                            <td>{{ App\AuthServer::where('id',Auth::user()->id)->value('client_token_3') }}</td>
                                        @endif
                                        @if(App\AuthServer::where('id',Auth::user()->id)->value('access_token_3') === NULL)
                                            <td>Brak</td>
                                        @else
                                            <td>{{ App\AuthServer::where('id',Auth::user()->id)->value('access_token_3') }}</td>
                                        @endif
                                        <td><a class="btn btn-danger btn-xs" href="{{ route('user.tokens.invalidate',3 )}}">UNIEWAŻNIJ</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        <p>Po unieważnieniu, autoryzowany klient automatycznie się wyloguje i zapyta ponownie o podanie danych do konta.</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection