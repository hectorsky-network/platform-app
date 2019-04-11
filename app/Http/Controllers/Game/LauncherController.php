<?php

namespace App\Http\Controllers\Game;

use App\Modpack;
use App\Skin;
use App\User;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Controller;

class LauncherController extends Controller
{
    protected function launcherstable(){
        $build = env('LAUNCHER_BUILD_STABLE', 0);
        $response = array(
            'build' => $build,
            'url' => array(
                'exe'=>"https://launcher.craftnetwork.eu.org/launcher/builds/".$build."/launcher-4.0-".$build.".exe",
                'jar'=>"https://launcher.craftnetwork.eu.org/launcher/builds/".$build."/launcher-4.0-".$build.".jar",
                'osx'=>"https://launcher.craftnetwork.eu.org/launcher/builds/".$build."/launcher-4.0-".$build."-osx.app.zip"),
            'resources' => array(
                array(
                    'filename' => "OpenSans+Cyberbit.ttf",
                    'url' => "https://launcher.craftnetwork.eu.org/launcher/assets/OpenSans+Cyberbit.ttf",
                    'md5' => "94a9d4cbcb9ceaa25000fa303fa81acc"),
                array(
                    'filename' => "Raleway+FireflySung.ttf",
                    'url' => "https://launcher.craftnetwork.eu.org/launcher/assets/Raleway+FireflySung.ttf",
                    'md5' => "b62087eb4b11746987c800c0512890ef"),
                array(
                    'filename' => "aether-dep.jar",
                    'url' => "https://launcher.craftnetwork.eu.org/launcher/assets/aether-dep.jar",
                    'md5' => "EBF34784444ABCB976F77C9E23692057")));
        return response()->json($response);
    }

    protected function launcherbeta(){
        $build = env('LAUNCHER_BUILD_BLEEDING', 0);
        $response = array(
            'build' => $build,
            'url' => array(
                'exe'=>"https://launcher.craftnetwork.eu.org/launcher/builds/".$build."/launcher-4.0-".$build.".exe",
                'jar'=>"https://launcher.craftnetwork.eu.org/launcher/builds/".$build."/launcher-4.0-".$build.".jar",
                'osx'=>"https://launcher.craftnetwork.eu.org/launcher/builds/".$build."/launcher-4.0-".$build."-osx.app.zip"),
            'resources' => array(
                array(
                    'filename' => "OpenSans+Cyberbit.ttf",
                    'url' => "https://launcher.craftnetwork.eu.org/launcher/assets/OpenSans+Cyberbit.ttf",
                    'md5' => "94a9d4cbcb9ceaa25000fa303fa81acc"),
                array(
                    'filename' => "Raleway+FireflySung.ttf",
                    'url' => "https://launcher.craftnetwork.eu.org/launcher/assets/Raleway+FireflySung.ttf",
                    'md5' => "b62087eb4b11746987c800c0512890ef"),
                array(
                    'filename' => "aether-dep.jar",
                    'url' => "https://launcher.craftnetwork.eu.org/launcher/assets/launcher/aether-dep.jar",
                    'md5' => "EBF34784444ABCB976F77C9E23692057")));
        return response()->json($response);
    }

    protected function discover(){
        $modpacks = Modpack::OrderBy('downloads', 'ratings')->limit(3)->get();
        return view('launcher.discover')->with(compact("modpacks"));
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

    protected function getModpackList(){
        $modpacks = Modpack::where('isOfficial',1)->get();
        $mpx = array();

        foreach($modpacks as $modpack){
            $mpx[$modpack->name] = $modpack->name.$modpack->displayName;
        }

        $response = array(
            'modpacks' => array(),
            'mirror_url' => 'http://mirror.technicpack.net/Technic/'
        );
        $response['modpacks'] = $mpx;

        return response()->json($response);
    }
}
