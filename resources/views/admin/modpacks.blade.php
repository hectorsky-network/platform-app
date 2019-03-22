@extends('layouts.app')
@section('content')
    <div class="jumbotron jumbotron-fluid admincp-bar">
        <div class="container">
            <h1 class="display-3">Administrator - Paczki modyfikacji</h1>
            <p class="lead">Wszystki paczki modyfikacji oraz zarządzanie tymi paczkami.</p>
        </div>
    </div>
    <div class="container" style="margin-top: -55px;">
        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">Lista Paczek modyfikacji <a href="{{ route('admin.modpacks.add.form') }}" class="btn btn-primary btn-sm" style="float:right; margin-top:-4px;">Dodaj paczkę modyfikacji</a></div>

                    <div class="panel-body">
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
                            @foreach ($modpacks as $modpack)
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
                                    <td><a class="btn btn-warning btn-sm" style="padding: 3px 10px;" href="{{ route('admin.modpacks.edit.form',$modpack->id) }}"><i class="fa fa-pencil" aria-hidden="true"></i></a> <a style="padding: 3px 10px;" class="btn btn-danger btn-sm" href="{{ route('admin.modpacks.delete',$modpack->id) }}"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
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