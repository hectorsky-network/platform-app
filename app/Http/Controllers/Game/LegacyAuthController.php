<?php

namespace App\Http\Controllers\Game;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AuthServer;

class LegacyAuthController extends Controller
{

    public function auth() {
        if(isset($_REQUEST['user']) AND isset($_REQUEST['password'])) {
            if (Auth::attempt(['email' => $_REQUEST['user'], 'password' => $_REQUEST['password']])) {
                if (Auth::user()->hasVerifiedEmail() !== FALSE) {
                    $unique = bin2hex(openssl_random_pseudo_bytes(16));
                    $id = Auth::user()->id;
                    $user = AuthServer::find($id);
                    $user->session = $unique;
                    $user->save();

                    $version = strtotime('0') * 1000;
                    echo $version . ':' . 'deprecated' . ':' . Auth::user()->name . ':' . $unique . ':' . Auth::user()->uuid;
                } else {
                    echo 'User not premium';
                }
            } else {
                echo 'Bad login';
            }
        }else{
            echo 'Bad login';
        }
    }

    public function joinServer(){
        if(isset($_REQUEST['sessionId']) || isset($_REQUEST['serverId'])) {
            //$idses = substr($_REQUEST['sessionId'], 6, 32);
            if ($_REQUEST['sessionId'] === AuthServer::where('session', $_REQUEST['sessionId'] )->value('session')) {
                AuthServer::where('session', $_REQUEST['sessionId'] )->update(['server' => $_REQUEST['serverId']]);
                echo 'OK';
            } else {
                echo 'Bad Login';
            }
        }else{
            abort(403);
        }
	}
	
	public function checkServer(){
        if(isset($_REQUEST['serverId'])) {
            if ($_REQUEST['serverId'] === AuthServer::where('server', $_REQUEST['serverId'])->value('server')) {
                echo "YES";
            } else {
                echo "NO";
            }
        }else{
            abort(403);
        }
	}
}
