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
            @include('user.menu')
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">Oto twój profil i pomniejsze statystyki</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
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
                            <i class="fa fa-cog" aria-hidden="true"></i> {{ App\AuthServer::where('id',Auth::user()->id)->value('client_token') }}<br>
                            <hr>
                            <i class="fa fa-id-card" aria-hidden="true"></i> Jest to twój unikalny identyfikator konta.<br>
                            <i class="fa fa-cog" aria-hidden="true"></i>  To jest twój ostatni zapisany w bazie identyfikator klienta
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">Krótki przegląd twoich paczek</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
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