@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="jumbotron">
            <h1 class="display-3">Paczki modyfikacji</h1>
            <p class="lead">Pobierz już dziś najlepsze paczki modyfikacji stworzone na Hector Platform.</p>
        </div>
        <cetner>
        <div class="row" style="margin: 0 auto;">
            @foreach ($modpacks as $modpack)
                <div class="col-md-auto" style="float:left; width:372px; margin-right: 8px;">
                    <div class="panel panel-default">
                        <div class="panel-heading">{{ $modpack->displayName }} <p style="float:right">{{ App\User::where('id',$modpack->owner)->value('name') }}</p></div>

                        <div class="panel-body" style="padding:0">
                            <img src="<?php if($modpack->logoUrl == NULL){echo '/images/nologo.png';}else{echo $modpack->logoUrl;}?>" width="370" height="220"/>
                            <div style="padding: 15px;"><?php echo str_limit($modpack->description , 125); ?></div>
                        </div>
                        <div style="padding: 2px 10px; border-top: 1px solid transparent; border-bottom-right-radius: 3px; border-bottom-left-radius: 3px; border-color: #d3e0e9; height:27px;">
                            <div style="float:left"><a href="{{ route('modpack-view',$modpack->id) }}"  class="btn btn-primary" style="padding: 1px 10px; font-size: 11px; margin-top: -3px;">Pobierz</a></div>
                            <div style="float:right"><i class="fa fa-download" aria-hidden="true"></i> {{ $modpack->downloads }} | <i class="fa fa-star" aria-hidden="true"></i> {{ $modpack->ratings }} | <i class="fa fa-play-circle-o" aria-hidden="true"></i> {{ $modpack->runs }}</div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        <center>
        <center>{{ $modpacks->links() }}</center>
    </div>
@endsection