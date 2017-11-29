@extends('layouts.app')
@section('content')
    <div class="container">
        <h2>Witaj w panelu użytkownika - {{ Auth::user()->name }}!</h2></br>
        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">Witaj w panelu administracyjnym, {{ Auth::user()->name }}!</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        Twoje UUID to: {{ Auth::user()->uuid }} </br>
                        You are logged in!
                    </div>
                </div>
            </div>
            @include('user.menu')
        </div>
    </div>
@endsection