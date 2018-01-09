@extends('layouts.app')
@section('content')
    <div class="container">
        <h2>Panel Administracyjny - Dodawanie nowego artykułu</h2></br>
        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">Kreator dodawania nowego artykułu <a href="{{ route('admin-articles') }}" class="btn btn-primary btn-sm" style="float:right; margin-top:-4px;">Wróć</a></div>

                    <div class="panel-body">
                        <p>Witaj w kreatorze tworzenia nowego artykułu</p>
                        <form class="form-horizontal" method="POST" action="{{ route('admin-addarticle-1') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="text" class="col-md-4 control-label">Tytuł</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control" name="title" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Zawartość</label>

                                <div class="col-md-6">
                                    <textarea id="text" type="text" class="form-control" name="text" autofocus></textarea>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Dodaj artykuł
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @include('admin.layouts.menu')
            @include('admin.widgets.systeminfo')
        </div>
    </div>
@endsection