@extends('layouts.app')
@section('content')
    <div class="jumbotron jumbotron-fluid settings-bar">
        <div class="container">
            <h1 class="display-3">Zarządzanie kontem</h1>
            <p class="lead">Witaj w swoim panelu użytkownika, {{ Auth::user()->name }}!</p>
        </div>
    </div>
    <div class="container" style="margin-top: -55px;">
        <div class="row">
            @include('user.layouts.menu')
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">Oto twój profil i pomniejsze statystyki</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if(Auth::user()->hasVerifiedEmail() === FALSE)
                            <div class="alert alert-danger">
                                <p>Twój adres E-Mail nie został zweryfikowany, funkcjonalnośc serwisu będzie ograniczona.</p>
                            </div>
                            @endif

                        <?php echo '<img src="'.route('gethead').'?u='.Auth::user()->name.'&s=80" class="avatar-profile" />';?>
                            <div class="profile-badges">
                               <center><h2 style="margin-top:10px;"><i class="fa fa-star" aria-hidden="true"></i></h2>
                                   <h3 style="margin-top:3px; font-size:14px;">{{ App\Modpack::where('owner',Auth::user()->id)->sum('ratings') }}</h3></center>
                            </div>
                            <div class="profile-badges">
                                <center><h2 style="margin-top:10px;"><i class="fa fa-play-circle-o" aria-hidden="true"></i></h2>
                                    <h3 style="margin-top:3px; font-size:14px;">{{ App\Modpack::where('owner',Auth::user()->id)->sum('runs') }}</h3></center>
                            </div>
                            <div class="profile-badges">
                                <center><h2 style="margin-top:10px;"><i class="fa fa-download" aria-hidden="true"></i></h2>
                                    <h3 style="margin-top:3px; font-size:14px;">{{ App\Modpack::where('owner',Auth::user()->id)->sum('downloads') }}</h3></center>
                            </div>
                            <i class="fa fa-user" aria-hidden="true"></i> {{ Auth::user()->name }}<br>
                            <i class="fa fa-user-plus" aria-hidden="true"></i> {{ Auth::user()->created_at }}</br>
                            <i class="fa fa-id-card" aria-hidden="true"></i> {{ App\AuthServer::where('id',Auth::user()->id)->value('uuid') }} </br>
                            <i class="fa fa-cog" aria-hidden="true"></i> {{ App\AuthServer::where('id',Auth::user()->id)->value('play_token') }}
                            <hr>

                           Poniżej pozkazano jakie urządzenia, mogą automatycznie logować się na twoje konto {{env('APP_NAME')}}.
                            <table class="table table-sm table-striped table-responsive-3">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Token Klienta</th>
                                    <th>Token Dostępu</th>
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
                                    </tr>
                                </tbody>
                            </table>
                            Jeśli chcesz unieważnić jakiś token z listy przejdź do menu <b><i class="fa fa-laptop" aria-hidden="true"></i> Wiele urządzeń</b>.
                            <hr>
                            <i class="fa fa-user" aria-hidden="true"></i> To jest twoja nazwa używana w grze i widoczna dla innych graczy.<br>
                            <i class="fa fa-user-plus" aria-hidden="true"></i> To jest twoja data rejestracji konta w serwisie {{env('APP_NAME')}}.<br>
                            <i class="fa fa-id-card" aria-hidden="true"></i> To jest twój unikalny identyfikator (UUID) konta.<br>
                            <i class="fa fa-cog" aria-hidden="true"></i>  To jest twój ostatni zapisany token użyty do gry.
                    </div>
                </div>

            </div>
            <div class="col-md-11">
                <div class="panel panel-default">
                    <div class="panel-heading">Krótki przegląd twoich paczek</div>

                    <div class="panel-body">
                        Oto krótki przegląd twoich paczek modyfikacji.
                        <table class="table table-sm table-striped table-responsive-3">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Twórca</th>
                                <th>Nazwa</th>
                                <th>Oficjalny</th>
                                <th>Serwerowy</th>
                                <th>Minecraft</th>
                                <th><i class="fa fa-download" aria-hidden="true"></i></th>
                                <th><i class="fa fa-star" aria-hidden="true"></i></th>
                                <th><i class="fa fa-play-circle-o" aria-hidden="true"></i></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($myModpacks as $modpack)
                                <tr>
                                    <td>{{ $modpack->id }}</td>
                                    <td>{{ App\User::where('id',$modpack->owner)->value('name') }}</td>
                                    <td>{{ $modpack->name }}</td>
                                    @if($modpack->isOfficial == 1)
                                        <td>Tak</td>
                                    @else
                                        <td>Nie</td>
                                    @endif
                                    @if($modpack->isServer == 1)
                                        <td>Tak</td>
                                    @else
                                        <td>Nie</td>
                                    @endif
                                    <td>{{ $modpack->minecraft }}</td>
                                    <td>{{ $modpack->downloads }}</td>
                                    <td>{{ $modpack->ratings }}</td>
                                    <td>{{ $modpack->runs }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection