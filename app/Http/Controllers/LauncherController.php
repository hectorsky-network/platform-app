<?php

namespace App\Http\Controllers;

use App\Modpack;
use App\Skin;
use App\User;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class LauncherController extends Controller
{
    protected function launcherupdate(){
        $build = 8;
        $response = array(
            'build' => $build,
            'url' => array(
                'exe'=>"https://cdn.hectorwilde.com/projects/hectorplatform/launcher/builds/".$build."/launcher-4.0-".$build.".exe",
                'jar'=>"https://cdn.hectorwilde.com/projects/hectorplatform/launcher/builds/".$build."/launcher-4.0-".$build.".jar",
                'osx'=>"https://cdn.hectorwilde.com/projects/hectorplatform/launcher/builds/".$build."/launcher-4.0-".$build."-osx.app.zip"),
            'resources' => array(
                array(
                    'filename' => "OpenSans+Cyberbit.ttf",
                    'url' => "https://cdn.hectorwilde.com/projects/hectorplatform/launcher/OpenSans+Cyberbit.ttf",
                    'md5' => "94a9d4cbcb9ceaa25000fa303fa81acc"),
                array(
                    'filename' => "Raleway+FireflySung.ttf",
                    'url' => "https://cdn.hectorwilde.com/projects/hectorplatform/launcher/Raleway+FireflySung.ttf",
                    'md5' => "b62087eb4b11746987c800c0512890ef"),
                array(
                    'filename' => "aether-dep.jar",
                    'url' => "https://cdn.hectorwilde.com/projects/hectorplatform/launcher/aether-dep.jar",
                    'md5' => "EBF34784444ABCB976F77C9E23692057")));
        return response()->json($response);
    }

    protected function getModpack($name){

    if(Modpack::where('name',$name)->value('isServer') == 1){
        $isServer = TRUE;
    }else{
        $isServer = FALSE;
    }
    if(Modpack::where('name',$name)->value('isOfficial') == 1){
        $isOfficial = TRUE;
    }else{
        $isOfficial = FALSE;
    }
    if(Modpack::where('name',$name)->value('forceDir') == 1){
        $forceDir = TRUE;
    }else{
        $forceDir = FALSE;
    }
    $response = array(
        'id' => Modpack::where('name',$name)->value('id'),
        'name' => Modpack::where('name',$name)->value('name'),
        'displayName' => Modpack::where('name',$name)->value('displayName'),
        'user' => User::where('id',Modpack::where('name',$name)->value('owner'))->value('name'),
        'url' => Modpack::where('name',$name)->value('url'),
        'platformUrl' => Modpack::where('name',$name)->value('platformUrl'),
        'minecraft' => Modpack::where('name',$name)->value('minecraft'),
        'ratings' => Modpack::where('name',$name)->value('ratings'),
        'downloads' => Modpack::where('name',$name)->value('downloads'),
        'runs' => Modpack::where('name',$name)->value('runs'),
        'description' => Modpack::where('name',$name)->value('description'),
        'tags' => Modpack::where('name',$name)->value('tags'),
        'isServer' => $isServer,
        'isOfficial' => $isOfficial,
        'version' => Modpack::where('name',$name)->value('version'),
        'forceDir' => $forceDir,
    );
    $response['feed'] = array();
    $response['icon'] = array(
        'url' => Modpack::where('name',$name)->value('iconUrl')
    );
    $response['logo'] = array(
        'url' => Modpack::where('name',$name)->value('logoUrl')
    );
    $response['background'] = array(
        'url' => Modpack::where('name',$name)->value('backgroundUrl')
    );
    $response['solder'] = Modpack::where('name',$name)->value('solderUrl');
    $response['discordServerId'] = NULL;
    return response()->json($response);
}

    protected function addRun($name){
        $modpack = Modpack::find(Modpack::where('name',$name)->value('id'));
        $modpack->runs = $modpack->runs + 1;
        $modpack->save();
    }

    protected function addInstall($name){
        $modpack = Modpack::find(Modpack::where('name',$name)->value('id'));
        $modpack->downloads = $modpack->downloads + 1;
        $modpack->save();
    }

    protected function getHead(){
        $size = isset($_GET['s']) ? max(8, min(250, $_GET['s'])) : 48;
        $userx = isset($_GET['u']) ? $_GET['u'] : '';
        $view = isset($_GET['v']) ? substr($_GET['v'], 0, 1) : 'f';
        $view = in_array($view, array('f', 'l', 'r', 'b')) ? $view : 'f';
        $usrn = Skin::where('id',User::where('name',$userx)->value('id'))->value('skin');
        $im = imagecreatefrompng("../storage/app/public/skins/".$usrn);
        $av = imagecreatetruecolor($size, $size);
        $x = array('f' => 8, 'l' => 16, 'r' => 0, 'b' => 24);
        imagecopyresized($av, $im, 0, 0, $x[$view], 8, $size, $size, 8, 8);         // Face
        imagecolortransparent($im, imagecolorat($im, 63, 0));                       // Black Hat Issue
        imagecopyresized($av, $im, 0, 0, $x[$view] + 32, 8, $size, $size, 8, 8);    // Accessories
        $imgpng = imagepng($av);
        $response = Response::stream(function() use($imgpng){
            echo $imgpng;
        }, 200, ["Content-Type"=> 'image/png']);
        return $response;
        imagedestroy($im);
        imagedestroy($av);

    }
}
