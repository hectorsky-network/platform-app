@extends('layouts.app')
@section('content')
    <div class="container">
        <h2>Panel użytkownika - Paczki modyfikacji </h2></br>
        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">Paczki modyfikacji</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        Poniżej wyświetlono wszystkie paczki modyfikacji, które zostały ci przyznane.
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
                                    <th>Zarządzanie</th>
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
                                        <td><a class="btn btn-warning btn-sm" style="padding: 3px 10px;" href="#"><i class="fa fa-pencil" aria-hidden="true"></i></a> <a style="padding: 3px 10px;" class="btn btn-danger btn-sm" href="#"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
            @include('user.menu')
        </div>
    </div>
@endsection