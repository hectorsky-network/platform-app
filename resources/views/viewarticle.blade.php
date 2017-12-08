@extends('layouts.app')
@section('content')
    @include('layouts.slider')
    <div class="container" style="margin-top: -50px;">
        <div class="row align-items-start">
            @include('layouts.partnerships')
                <div class="col-md-9" style="float:left; ">
                    <div class="panel panel-default">
                        <div class="panel-heading">{{ $article->title }} <p style="float:right;"><i class="fa fa-user" aria-hidden="true"></i> {{ App\User::where('id',$article->owner)->value('name') }} </p></div>

                        <div class="panel-body">
                            <?php echo '<img src="'.route('gethead').'?u='.App\User::where('id',$article->owner)->value('name').'&s=80" class="avatar-article"/>'.$article->text; ?>
                        </div>
                        <div style="padding: 2px 10px; border-top: 1px solid transparent; border-bottom-right-radius: 3px; border-bottom-left-radius: 3px; border-color: #d3e0e9; height:27px;">
                            <div style="float:right"><i class="fa fa-eye" aria-hidden="true"></i> {{ $article->views }} | <i class="fa fa-calendar" aria-hidden="true"></i> <?php echo date('d-m-Y', strtotime($article->created_at)); ?> | <i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo date('H:i', strtotime($article->created_at)); ?></div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
@endsection