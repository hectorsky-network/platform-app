@extends('layouts.app')
@section('content')
    <div class="jumbotron jumbotron-fluid settings-bar">
        <div class="container">
            <h1 class="display-3">Zarządzanie skórkami<sup><span class="badge badge-danger">BETA</span></sup></h1>
            <p class="lead">W tym miejscu możesz zmienić swoją skórkę w grze.</p>
        </div>
    </div>
    <div class="container" style="margin-top: -55px;">
        <div class="row">
            @include('user.menu')
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">Panel zmiany skórki</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        Tutaj możesz zmienić swoją skórkę!
                            @if (Session::has('success'))
                                <div class="alert alert-success"><i class="fa fa-check-circle" aria-hidden="true"></i>  {{ Session::get('success') }}</div>
                            @endif
                            @if (Session::has('bad'))
                                <div class="alert alert-danger"><i class="fa fa-check-circle" aria-hidden="true"></i>  {{ Session::get('bad') }}</div>
                            @endif
                            <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{ route('skin-u') }}">
                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('skin') ? ' has-error' : '' }}">
                                    <label for="skin" class="col-md-4 control-label">Plik skórki</label>
                                    <div class="col-md-6">
                                        <input type="file" id="skin" name='skin' class="custom-file-input">
                                        <span class="custom-file-control"></span>
                                        @if ($errors->has('skin'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('skin') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-8 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            Prześlij skórkę
                                        </button>
                                    </div>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection