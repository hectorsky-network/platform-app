@extends('layouts.app')
@section('content')
    <div class="jumbotron jumbotron-fluid admincp-bar">
        <div class="container">
            <h1 class="display-3">Administrator - Profil {{ $user->name }}</h1>
            <p class="lead">Profil użytkownika {{ $user->name }}.</p>
        </div>
    </div>
    <div class="container" style="margin-top: -55px;">
        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">Profil użytkownika {{ $user->name }}
                        <a href="{{ route('admin-deluser',$user->id) }}" class="btn btn-danger btn-sm" style="float:right; margin-top: -4px;">Usuń użytkownika</a>
                        <a href="{{ route('admin-delcape',$skin->id) }}" class="btn btn-danger btn-sm" style="float:right; margin-top: -4px; margin-right:3px;">Usuń pelerynę</a>
                        <a href="{{ route('admin-delskin',$skin->id) }}" class="btn btn-danger btn-sm" style="float:right; margin-top: -4px; margin-right:3px;">Usuń skórkę</a>
                    </div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <?php echo '<img src="'.route('gethead').'?u='.$user->name.'&s=80" class="avatar-profile" />';?>
                        <div class="profile-badges">
                            <center><h2 style="margin-top:10px;"><i class="fa fa-star" aria-hidden="true"></i></h2>
                                <h3 style="margin-top:3px; font-size:14px;">{{ App\Modpack::where('owner',$user->id)->sum('ratings') }}</h3></center>
                        </div>
                        <div class="profile-badges">
                            <center><h2 style="margin-top:10px;"><i class="fa fa-play-circle-o" aria-hidden="true"></i></h2>
                                <h3 style="margin-top:3px; font-size:14px;">{{ App\Modpack::where('owner',$user->id)->sum('runs') }}</h3></center>
                        </div>
                        <div class="profile-badges">
                            <center><h2 style="margin-top:10px;"><i class="fa fa-download" aria-hidden="true"></i></h2>
                                <h3 style="margin-top:3px; font-size:14px;">{{ App\Modpack::where('owner',$user->id)->sum('downloads') }}</h3></center>
                        </div>
                        <i class="fa fa-user" aria-hidden="true"></i> {{ $user->name }}<br>
                        <i class="fa fa-user-plus" aria-hidden="true"></i> {{ $user->created_at }}</br>
                        <i class="fa fa-id-card" aria-hidden="true"></i> {{ $game->uuid }} </br>
                        <i class="fa fa-cog" aria-hidden="true"></i> {{ $game->client_token }}<br>
                        <hr>
                        <i class="fa fa-id-card" aria-hidden="true"></i> Jest to twój unikalny identyfikator konta.<br>
                        <i class="fa fa-cog" aria-hidden="true"></i>  To jest twój ostatni zapisany w bazie identyfikator klienta
                    </div>
                </div>
            </div>
            @include('admin.layouts.menu')
        </div>
    </div>
@endsection