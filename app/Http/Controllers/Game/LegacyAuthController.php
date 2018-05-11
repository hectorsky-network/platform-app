<?php

namespace App\Http\Controllers\Game;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AuthServer;

class LegacyAuth extends Controller
{
    public function joinServer(){
		$idses = substr($_REQUEST['sessionId'], 6,32);
		if($idses === AuthServer::where('access_token',$idses)->value('access_token')){
		AuthServer::where('access_token',$idses)->update(['session' => $idses, 'server' => $_REQUEST['server']]);
		echo 'OK';
		}else{
		echo 'Bad Login';
		}
	}
	
	public function checkServer(){
		if($_REQUEST['serverId'] === AuthServer::where('server',$_REQUEST['serverId'])->value('server')){
			echo "YES";
		}else{
			echo "NO";
		}
	}
}
