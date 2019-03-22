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
                        <a href="{{ route('admin.users.delete',$user->id) }}" class="btn btn-danger btn-sm" style="float:right; margin-top: -4px;">Usuń użytkownika</a>
                        <a href="{{ route('admin.users.cape.delete',$skin->id) }}" class="btn btn-danger btn-sm" style="float:right; margin-top: -4px; margin-right:3px;">Usuń pelerynę</a>
                        <a href="{{ route('admin.users.skin.delete',$skin->id) }}" class="btn btn-danger btn-sm" style="float:right; margin-top: -4px; margin-right:3px;">Usuń skórkę</a>
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
                            <span class="badge"><i class="fa fa-user" aria-hidden="true"></i> {{ $user->name }}</span><br>
                            <span class="badge"><i class="fa fa-user-plus" aria-hidden="true"></i> {{ $game->created_at }}</span></br>
                            <span class="badge"><i class="fa fa-id-card" aria-hidden="true"></i> {{ $game->uuid }}</span> </br>
                            <span class="badge"><i class="fa fa-cog" aria-hidden="true"></i> {{ $game->play_token }}</span>
                        <hr>
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
                                    @if(App\AuthServer::where('id',$user->id)->value('client_token') === NULL)
                                        <td>Brak</td>
                                    @else
                                        <td>{{ App\AuthServer::where('id',$user->id)->value('client_token') }}</td>
                                    @endif
                                    @if(App\AuthServer::where('id',$user->id)->value('access_token') === NULL)
                                        <td>Brak</td>
                                    @else
                                        @if(App\AuthServer::where('id',$user->id)->value('access_token') === App\AuthServer::where('id',$user->id)->value('play_token') )
                                            <td><span class="badge badge-official">{{ App\AuthServer::where('id',$user->id)->value('access_token') }}</span></td>
                                        @else
                                            <td>{{ App\AuthServer::where('id',$user->id)->value('access_token') }}</td>
                                        @endif
                                    @endif
                                    <td><a class="btn btn-danger btn-xs" href="{{ route('admin.users.invalidate.token',[$user->id,1] )}}">UNIEWAŻNIJ</a></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    @if(App\AuthServer::where('id',$user->id)->value('client_token_2') === NULL)
                                        <td>Brak</td>
                                    @else
                                        <td>{{ App\AuthServer::where('id',$user->id)->value('client_token_2') }}</td>
                                    @endif
                                    @if(App\AuthServer::where('id',$user->id)->value('access_token_2') === NULL)
                                        <td>Brak</td>
                                    @else
                                        @if(App\AuthServer::where('id',$user->id)->value('access_token_2') === App\AuthServer::where('id',$user->id)->value('play_token') )
                                            <td><span class="badge badge-official">{{ App\AuthServer::where('id',$user->id)->value('access_token_2') }}</span></td>
                                        @else
                                            <td>{{ App\AuthServer::where('id',$user->id)->value('access_token_2') }}</td>
                                        @endif
                                    @endif
                                    <td><a class="btn btn-danger btn-xs" href="{{ route('admin.users.invalidate.token',[$user->id,2] )}}">UNIEWAŻNIJ</a></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    @if(App\AuthServer::where('id',$user->id)->value('client_token_3') === NULL)
                                        <td>Brak</td>
                                    @else
                                        <td>{{ App\AuthServer::where('id',$user->id)->value('client_token_3') }}</td>
                                    @endif
                                    @if(App\AuthServer::where('id',$user->id)->value('access_token_3') === NULL)
                                        <td>Brak</td>
                                    @else
                                        @if(App\AuthServer::where('id',$user->id)->value('access_token_3') === App\AuthServer::where('id',$user->id)->value('play_token') )
                                            <td><span class="badge badge-official">{{ App\AuthServer::where('id',$user->id)->value('access_token_3') }}</span></td>
                                        @else
                                            <td>{{ App\AuthServer::where('id',$user->id)->value('access_token_3') }}</td>
                                        @endif
                                    @endif
                                    <td><a class="btn btn-danger btn-xs" href="{{ route('admin.users.invalidate.token',[$user->id, 3] )}}">UNIEWAŻNIJ</a></td>
                                </tr>
                                </tbody>
                            </table>
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
            @include('admin.layouts.menu')
        </div>
    </div>
@endsection