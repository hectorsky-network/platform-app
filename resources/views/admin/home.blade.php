@extends('layouts.app')
@section('content')
    <div class="jumbotron jumbotron-fluid admincp-bar">
        <div class="container">
            <h1 class="display-3">Administrator - System</h1>
            <p class="lead">Statystyki całego systemu, oraz informacje o systemie.</p>
        </div>
    </div>
    <div class="container" style="margin-top: -55px;">
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
                            <?php echo '<img src="'.route('gethead').'?u='.Auth::user()->name.'&s=80" class="avatar-profile" />';?>
                            <div class="profile-badges">
                                <center><h2 style="margin-top:10px;"><i class="fa fa-star" aria-hidden="true"></i></h2>
                                    <h3 style="margin-top:3px; font-size:14px;">{{ App\Modpack::sum('ratings') }}</h3></center>
                            </div>
                            <div class="profile-badges">
                                <center><h2 style="margin-top:10px;"><i class="fa fa-play-circle-o" aria-hidden="true"></i></h2>
                                    <h3 style="margin-top:3px; font-size:14px;">{{ App\Modpack::sum('runs') }}</h3></center>
                            </div>
                            <div class="profile-badges">
                                <center><h2 style="margin-top:10px;"><i class="fa fa-download" aria-hidden="true"></i></h2>
                                    <h3 style="margin-top:3px; font-size:14px;">{{ App\Modpack::sum('downloads') }}</h3></center>
                            </div>
                            <div class="profile-badges">
                                <center><h2 style="margin-top:10px;"><i class="fa fa-users" aria-hidden="true"></i></h2>
                                    <h3 style="margin-top:3px; font-size:14px;">{{ App\User::count() }}</h3></center>
                            </div>
                            <div class="profile-badges">
                                <center><h2 style="margin-top:10px;"><i class="fa fa-compass" aria-hidden="true"></i></h2>
                                    <h3 style="margin-top:3px; font-size:14px;">{{ App\Modpack::count() }}</h3></center>
                            </div>
                    </div>
                </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">Informacje o systemie</div>

                                <div class="panel-body">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th scope="col">Parametr Systemu</th>
                                            <th scope="col">Wartość</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <th scope="row">System operacyjny</th>
                                            <td><?php echo (php_uname($mode='s').' '.php_uname($mode='r'));?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Architektura</th>
                                            <td><?php echo (php_uname($mode='m'));?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Nazwa hosta</th>
                                            <td><?php echo (php_uname($mode='n'));?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Stabilna kompilacja launchera</th>
                                            <td><?php echo env('LAUNCHER_BUILD_STABLE');?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Rozwojowa kompilacja launchera</th>
                                            <td><?php echo env('LAUNCHER_BUILD_BLEEDING');?></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
            </div>
            @include('admin.layouts.menu')
        </div>
    </div>
@endsection
