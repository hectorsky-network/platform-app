@extends('layouts.app')
@section('content')
    <div class="jumbotron jumbotron-fluid modpacks-bar">
        <div class="container">
            <h1 class="display-3">{{ $modpack->displayName }}</h1>
            <p class="lead"><?php echo str_limit($modpack->description , 110); ?></p>
        </div>
    </div>
    <div class="container" style="margin-top: -55px;">
        <div class="row justify-content-start">
            <div class="col-md-9" style="float:left;">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $modpack->displayName }} <div class="input-group input-group-sm" style="float: right; margin-top: -4px; width: 300px;">
                            <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-download" aria-hidden="true"></i></span>
                            <input type="text" name='packUrl' class="form-control" placeholder="Username" aria-label="Username" value="{{URL::to('/')}}/api/modpack/{{$modpack->name}}" aria-describedby="sizing-addon2">
                            @if($user = Illuminate\Support\Facades\Auth::user())
                            <span class="input-group-btn">
                                @if(App\Star::where('givenBy', '=', Illuminate\Support\Facades\Auth::user()->id)->where('givenTo', '=', $modpack->id)->exists())
                                    <a href="{{ route('modpack-delstar',$modpack->id) }}" class="btn btn-danger"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                    @else
                                <a href="{{ route('modpack-star',$modpack->id) }}" class="btn btn-primary"><i class="fa fa-star" aria-hidden="true"></i></a>
                                    @endif
                                @if($modpack->url != NULL)
                                    <a href="{{$modpack->url}}" class="btn btn-success"><i class="fa fa-download" aria-hidden="true"></i></a>
                                    @endif
      </span>@endif
                        </div></div>
                    <div class="panel-body">
                        @if (Session::has('success'))
                            <div class="alert alert-success"><i class="fa fa-check-circle" aria-hidden="true"></i>  {{ Session::get('success') }}</div>
                        @endif
                            <?php if($modpack->logoUrl == NULL){$modpacklogo = '/images/nologo.png';}else{$modpacklogo = $modpack->logoUrl;}?>
                        <?php echo '<img src="'.$modpacklogo.'" style="float:right; border: 5px #dcdcdc solid; border-radius:3px; margin-left: 15px;"/>'.$modpack->description; ?>
                    </div>
                </div>
            </div>
            <div class="col-md-3 flex-first" style="float:right;">
                <div class="panel panel-default">
                    <div class="panel-heading">O paczce</div>
                    <div class="panel-body">
                        <table class="table table-sm">
                            <tbody>
                            <tr>
                                <td>Wersja</td>
                                <td>{{$modpack->version}}</td>
                            </tr>
                            <tr>
                                <td>Minecraft</td>
                                <td>{{$modpack->minecraft}}</td>
                            </tr>
                            <tr>
                                <td>Twórca</td>
                                <td>{{ App\User::where('id',$modpack->owner)->value('name') }}</td>
                            </tr>
                            <tr>
                                <td>Utworzona</td>
                                <td><?php echo date('d.m.Y | H:i', strtotime($modpack->created_at)); ?></td>
                            </tr>
                            <tr>
                                <td>Aktualizacja</td>
                                <td><?php echo date('d.m.Y | H:i', strtotime($modpack->updated_at)); ?></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-3" style="float: right;">
                <div class="panel panel-default">
                    <div class="panel-heading">Statystyki</div>
                    <div class="panel-body">
                        <table class="table table-sm">
                            <tbody>
                            <tr>
                                <td><i class="fa fa-star" aria-hidden="true"></i></td>
                                <td>{{$modpack->ratings}}</td>
                            </tr>
                            <tr>
                                <td><i class="fa fa-play-circle-o" aria-hidden="true"></i></td>
                                <td>{{$modpack->runs}}</td>
                            </tr>
                            <tr>
                                <td><i class="fa fa-download" aria-hidden="true"></i></td>
                                <td>{{$modpack->downloads}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection