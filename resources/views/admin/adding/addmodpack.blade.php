@extends('layouts.app')
@section('content')
    <div class="jumbotron jumbotron-fluid admincp-bar">
        <div class="container">
            <h1 class="display-3">Administrator - Nowa paczka </h1>
            <p class="lead">Tutaj dodasz nową paczkę modyfikacji.</p>
        </div>
    </div>
    <div class="container" style="margin-top: -55px;">
        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">Kreator dodawania nowej paczki modyfikacji <a href="{{ route('admin-modpacks') }}" class="btn btn-primary btn-sm" style="float:right; margin-top:-4px;">Wróć</a></div>

                    <div class="panel-body">
                        <p>Witaj w kreatorze dodawania nowej paczki modyfikacji.</p>
                        <form class="form-horizontal" method="POST" action="{{ route('admin-addmodpack-1') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('owner') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">ID Właściciela</label>

                                <div class="col-md-6">
                                    <input id="owner" type="text" class="form-control" name="owner" required autofocus>

                                    @if ($errors->has('owner'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('owner') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Nazwa</label>

                                <div class="col-md-6">
                                    <input id="name" type="name" class="form-control" name="name" value="{{ old('name') }}" required>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('displayName') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Nazwa wyświetlana</label>

                                <div class="col-md-6">
                                    <input id="displayName" class="form-control" name="displayName" required>

                                    @if ($errors->has('displayName'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('displayName') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('url') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">URL</label>

                                <div class="col-md-6">
                                    <input id="url" class="form-control" name="url">

                                    @if ($errors->has('url'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('url') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('platformUrl') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">URL Platformy</label>

                                <div class="col-md-6">
                                    <input id="platformUrl" class="form-control" name="platformUrl">

                                    @if ($errors->has('plarformUrl'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('platformUrl') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('minecraft') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Wersja Minecrafta</label>

                                <div class="col-md-6">
                                    <input id="minecraft" class="form-control" name="minecraft" required>

                                    @if ($errors->has('minecraft'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('minecraft') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Opis</label>

                                <div class="col-md-6">
                                    <textarea id="description" class="form-control" name="description"></textarea>

                                    @if ($errors->has('description'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('tags') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Tagi</label>

                                <div class="col-md-6">
                                    <input id="tags" class="form-control" name="tags">

                                    @if ($errors->has('tags'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('tags') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <hr>
                            <div class="form-group{{ $errors->has('isOfficial') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Oficjalny</label>

                                <div class="col-md-6">
                                    <select class="form-control" id="isOfficial" name="isOfficial">
                                        <option value="0">Nie</option>
                                        <option value="1">Tak</option>
                                    </select>

                                    @if ($errors->has('isOfficial'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('isOfficial') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('isServer') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Serwerowy</label>

                                <div class="col-md-6">
                                    <select class="form-control" id="isServer" name="isServer">
                                        <option value="0">Nie</option>
                                        <option value="1">Tak</option>
                                    </select>

                                    @if ($errors->has('isServer'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('isServer') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <hr>
                            <div class="form-group{{ $errors->has('version') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Wersja paczki</label>

                                <div class="col-md-6">
                                    <input id="version" class="form-control" name="version" required>

                                    @if ($errors->has('version'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('version') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('forceDir') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">forceDir</label>

                                <div class="col-md-6">
                                    <select class="form-control" id="forceDir" name="forceDir">
                                        <option value="0">Nie</option>
                                        <option value="1">Tak</option>
                                    </select>

                                    @if ($errors->has('forceDir'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('forceDir') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('feedUrl') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Adres RSS</label>

                                <div class="col-md-6">
                                    <input id="feedUrl" class="form-control" name="feedUrl">

                                    @if ($errors->has('feedUrl'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('feedUrl') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <hr>
                            <div class="form-group{{ $errors->has('iconUrl') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Adres URL Ikony</label>

                                <div class="col-md-6">
                                    <input id="iconUrl" class="form-control" name="iconUrl">

                                    @if ($errors->has('iconUrl'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('iconUrl') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('logoUrl') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Adres URL Loga</label>

                                <div class="col-md-6">
                                    <input id="logoUrl" class="form-control" name="logoUrl">

                                    @if ($errors->has('logoUrl'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('logoUrl') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('backgroundUrl') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Adres URL Tła</label>

                                <div class="col-md-6">
                                    <input id="backgroundUrl" class="form-control" name="backgroundUrl" >

                                    @if ($errors->has('backgroundUrl'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('backgroundUrl') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <hr>
                            <div class="form-group{{ $errors->has('solderUrl') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Adres URL Soldera</label>

                                <div class="col-md-6">
                                    <input id="solderUrl" class="form-control" name="solderUrl">

                                    @if ($errors->has('solderUrl'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('solderUrl') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Dodaj paczkę modyfikacji
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @include('admin.layouts.menu')
        </div>
    </div>
@endsection