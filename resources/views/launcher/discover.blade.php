<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Launcher Discover</title>
    <link href="/css/discover.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,300,100|Open+Sans:400,700' rel='stylesheet' type='text/css'>
</head>

<body>
<div class="container">
    <div class="main-image">
        <a href="/"><img src="/images/discover/banner.png"/></a>
        <div class="bottom-main">
            <div class="bottom-left">
                <a href="ts3server://ts.hectorwilde.com/"><img src="/images/discover/ts3.png"></a>
            </div>
            <div class="bottom-right">
                <a href="https://hectorwilde.com/forums/"><img src="/images/discover/forum.png"></a>
            </div>
        </div>
    </div>

    <div class="sidebar">
        <h2 class="trending-title"><center>POPULARNE PACZKI</center></h2>
        @foreach ($modpacks as $modpack)
        <div class="side-pack">
            <div class="pack-logo"  style="background-image: url(<?php if($modpack->logoUrl == NULL){echo '/images/nologo.png';}else{echo $modpack->logoUrl;}?>);">
                <a href="{{ $modpack->platformUrl }}" class="pack-hover">
              <span class="popup">
                <span class="popup-name">{{ $modpack->displayName }}</span><br>
                <span class="popup-view"><?php echo(str_limit($modpack->description  , 30));?></span>
              </span>
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>
</body>
</html>
