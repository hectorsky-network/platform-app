@extends('layouts.app')
@section('content')
    <div class="jumbotron jumbotron-fluid settings-bar">
        <div class="container">
            <h1 class="display-3">Edycja profilu</h1>
            <p class="lead">W tym miejscu możesz zmienić parę informacji w swoim profilu.</p>
        </div>
    </div>
    <div class="container" style="margin-top: -55px;">
        <div class="row">
            @include('user.layouts.menu')
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">Edycja profilu</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                            W tym miejscu możesz zmienić parę informacji w swoim profilu.
                        @if (Session::has('success'))
                            <div class="alert alert-success"><i class="fa fa-check-circle" aria-hidden="true"></i>  {{ Session::get('success') }}</div>
                        @endif
                        @if (Session::has('bad'))
                            <div class="alert alert-danger"><i class="fa fa-check-circle" aria-hidden="true"></i>  {{ Session::get('bad') }}</div>
                        @endif
                            <form method="post" action="<?php route('user.editprofile2', $user)?>">
                                {{ csrf_field() }}
                                {{ method_field('patch') }}

                                <input type="text" name="name"  value="{{ $user->name }}" />

                                <input type="email" name="email"  value="{{ $user->email }}" />

                                <input type="password" name="password" />

                                <input type="password" name="password_confirmation" />

                                <button type="submit">Send</button>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection