@extends('layouts.app')
@section('content')
    <div class="jumbotron jumbotron-fluid admincp-bar">
        <div class="container">
            <h1 class="display-3">Administrator - Użytkownicy</h1>
            <p class="lead">Zarządzanie kontami użytkowników, oraz lista skinów oraz UUID.</p>
        </div>
    </div>
    <div class="container" style="margin-top: -55px;">
        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">Lista użytkowników <a href="{{ route('admin-adduser') }}" class="btn btn-primary btn-sm" style="float:right; margin-top:-4px;">Dodaj użytkownika</a></div>

                    <div class="panel-body">
                        @if (Session::has('success'))
                            <div class="alert alert-success">{{ Session::get('success') }}</div>
                        @endif
                        <table class="table table-sm table-striped table-responsive-3">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nazwa użytkownika</th>
                                <th>E-Mail</th>
                                <th>Admin</th>
                                <th>Data Rejestracji</th>
                                <th>Zarządzanie</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->isAdmin }}</td>
                                    <td>{{ $user->created_at }}</td>
                                    <td><a class="btn btn-warning btn-sm" style="padding: 3px 10px;" href="{{ route('admin-edituser',$user->id) }}">EDYTUJ</a> <a style="padding: 3px 10px;" class="btn btn-danger btn-sm" href="{{ route('admin-deluser',$user->id) }}">USUŃ</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <table class="table table-sm table-striped table-responsive-3">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>UUID</th>
                                <th>Client Token</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($games as $gmp)
                                <tr>
                                    <td>{{ $gmp->id }}</td>
                                    <td>{{ $gmp->uuid }}</td>
                                    <td>{{ $gmp->client_token }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <table class="table table-sm table-striped table-responsive-3">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Skin</th>
                                <th>Cape</th>
                                <th>Zarządzanie</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($skins as $skin)
                                <tr>
                                    <td>{{ $skin->id }}</td>
                                    <td>{{ $skin->skin }}</td>
                                    <td>{{ $skin->cape }}</td>
                                    <td><a style="padding: 3px 7px;" class="btn btn-danger btn-sm" href="{{ route('admin-delskin',$skin->id) }}">SKIN</a> <a style="padding: 3px 7px;" class="btn btn-danger btn-sm" href="{{ route('admin-delcape',$skin->id) }}">CAPE</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                            <center>{{ $users->links() }}</center>
                    </div>
                </div>
            </div>
            @include('admin.layouts.menu')
            @include('admin.widgets.systeminfo')
        </div>
    </div>
@endsection