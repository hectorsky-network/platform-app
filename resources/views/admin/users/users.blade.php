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
                                <th>Data rejestracji</th>
                                <th>Zarządzanie</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td><a href="{{ route('admin-viewuser',$user->id) }}">{{ $user->name }}</a></td>
                                    <td>{{ $user->email }}</td>
                                    <td>@if($user->isAdmin === 1)
                                        <span class="badge badge-official">TAK</span>
                                            @else
                                            <span class="badge">NIE</span>
                                            @endif
                                     </td>
                                    <td>{{ $user->created_at }}</td>
                                    <td><a class="btn btn-primary btn-sm" style="padding: 3px 10px;" href="{{ route('admin-viewuser',$user->id) }}"><i class="fa fa-eye" aria-hidden="true"></i></a> <a class="btn btn-warning btn-sm" style="padding: 3px 10px;" href="{{ route('admin-edituser',$user->id) }}"><i class="fa fa-pencil" aria-hidden="true"></i></a> <a style="padding: 3px 10px;" class="btn btn-danger btn-sm" href="{{ route('admin-deluser',$user->id) }}"><i class="fa fa-trash" aria-hidden="true"></i></a> </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                            <center>{{ $users->links() }}</center>
                    </div>
                </div>
            </div>
            @include('admin.layouts.menu')
        </div>
    </div>
@endsection