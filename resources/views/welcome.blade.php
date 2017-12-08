@extends('layouts.app')
@section('content')
    @include('layouts.slider')
    <div class="container" style="margin-top: -46px;">
        <div class="row align-items-start">
            @include('layouts.partnerships')
            @foreach ($articles as $article)
                <div class="col-md-9" style="float:left;">
                    <div class="panel panel-default">
                        <div class="panel-heading"><a href="{{ route('article-view',$article->id) }}">{{ $article->title }}</a> <p style="float:right;"><i class="fa fa-user" aria-hidden="true"></i> {{ App\User::where('id',$article->owner)->value('name') }} </p></div>

                        <div class="panel-body">
                            <?php echo '<img src="'.route('gethead').'?u='.App\User::where('id',$article->owner)->value('name').'&s=80" class="avatar-article"/>'.str_limit($article->text  , 560); ?>
                        </div>
                        <div style="padding: 2px 10px; border-top: 1px solid transparent; border-bottom-right-radius: 3px; border-bottom-left-radius: 3px; border-color: #d3e0e9; height:27px;">
                            <div style="float:left"><a href="{{ route('article-view',$article->id) }}" class="btn btn-primary" style="padding: 1px 10px; font-size: 11px; margin-top: -3px;">Czytaj dalej... <i class="fa fa-arrow-right" aria-hidden="true"></i></a></div>
                            <div style="float:right"><i class="fa fa-eye" aria-hidden="true"></i> {{ $article->views }} | <i class="fa fa-calendar" aria-hidden="true"></i> <?php echo date('d-m-Y', strtotime($article->created_at)); ?> | <i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo date('H:i', strtotime($article->created_at)); ?></div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection