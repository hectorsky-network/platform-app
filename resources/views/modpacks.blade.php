@extends('layouts.app')
@section('content')
    <div class="jumbotron jumbotron-fluid modpacks-bar">
        <div class="container">
            <h1 class="display-3">Paczki modyfikacji</h1>
            <p class="lead">Tutaj możesz pobrać najnowsze paczki modyfikacji przeznaczone dla {{env("APP_NAME")}}.</p>
        </div>
    </div>
    <div class="container" style="margin-top: -55px;">
        <div class="row" style="margin: 0 auto;">
            @if(count($modpacks) > 0)
            @foreach ($modpacks as $modpack)
                <div class="col-md-auto" style="float:left; width:372px; margin-right: 8px;">
                    <div class="panel panel-default">
                        <div class="panel-heading">{{ $modpack->displayName }} <p style="float:right">@if($modpack->isOfficial == 1)<span class="badge badge-official">Oficjalna</span>@endif  @if($modpack->isServer == 1)<span class="badge badge-server">Serwerowa</span>@endif</p></div>

                        <div class="panel-body" style="padding:0">
                            <a href="{{ route('modpack-view',$modpack->id) }}"><img src="<?php if($modpack->logoUrl == NULL){echo '/images/nologo.png';}else{echo $modpack->logoUrl;}?>" width="370" height="220"/></a>
                            <div style="padding: 15px;"><?php echo str_limit($modpack->description , 125); ?></div>
                        </div>
                        <div style="padding: 2px 10px; border-top: 1px solid transparent; border-bottom-right-radius: 3px; border-bottom-left-radius: 3px; border-color: #d3e0e9; height:27px;">
                            <div style="float:left"><a href="{{ route('modpack-view',$modpack->id) }}"  class="btn btn-success" style="padding: 1px 10px; font-size: 11px; margin-top: -3px;">Więcej informacji i pobieranie...</a></div>
                            <div style="float:right"><i class="fa fa-user" aria-hidden="true"></i> {{ App\User::where('id',$modpack->owner)->value('name') }}</div>
                        </div>
                    </div>
                </div>
            @endforeach
                <center>{{ $modpacks->links() }}</center>
                @else
                <div class="panel panel-default" style="text-align:center;">
                    <div class="panel-body">
                        <h1>Właściciel platformy nie dodał żadnej paczki modyfikacji!</h1>
                        <h3>Wróć później...</h3>
                        <p>Jeśli jesteś <b>administratorem</b> tej platformy mcHub, <b>zaloguj się</b> oraz przejdź do <b>Panel administracyjny -> Paczki modyfikacji</b> i dodaj jakąś paczkę modyfikacji!</p>
                        <p><b>Przepraszamy za utrudnienia :-(</b></p>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection