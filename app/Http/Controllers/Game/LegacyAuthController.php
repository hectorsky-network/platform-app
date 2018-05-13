<?php

namespace App\Http\Controllers\Game;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AuthServer;

class LegacyAuthController extends Controller
{
    public function joinServer(){
        if(isset($_REQUEST['sessionId']) || isset($_REQUEST['serverId'])) {
            $idses = substr($_REQUEST['sessionId'], 6, 32);
            if ($idses === AuthServer::where('access_token', $idses)->value('access_token')) {
                AuthServer::where('access_token', $idses)->update(['session' => $idses, 'server' => $_REQUEST['serverId']]);
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
