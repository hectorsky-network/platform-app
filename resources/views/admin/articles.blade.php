@extends('layouts.app')
@section('content')
    <div class="container">
        <h2>Panel Administracyjny - Zarządzanie artykułami</h2></br>
        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">Lista Artykułów <a href="{{ route('admin-addarticle') }}" class="btn btn-primary btn-sm" style="float:right; margin-top:-4px;">Dodaj artykuł</a></div>

                    <div class="panel-body">
                        <table class="table table-sm table-striped table-responsive-3">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Twórca</th>
                                <th>Tytuł</th>
                                <th>Wyświetlenia</th>
                                <th>Zarządzanie</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($articles as $article)
                                <tr>
                                    <td>{{ $article->id }}</td>
                                    <td>{{ App\User::where('id',$article->owner)->value('name') }}</td>
                                    <td>{{ $article->title }}</td>
                                    <td>{{ $article->views }}</td>
                                    <td><a class="btn btn-warning btn-sm" style="padding: 3px 10px;" href="{{ route('admin-editarticle',$article->id) }}"><i class="fa fa-pencil" aria-hidden="true"></i></a> <a style="padding: 3px 10px;" class="btn btn-danger btn-sm" href="{{ route('admin-delmodpack',$article->id) }}"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @include('admin/menu')
            @include('admin/systeminfo')
        </div>
    </div>
@endsection