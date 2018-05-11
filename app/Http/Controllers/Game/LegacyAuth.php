<?php

namespace App\Http\Controllers\Game;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AuthServer;

class LegacyAuth extends Controller
{
    public function joinServer(){
		if($_REQUEST['sessionId'] === AuthServer::where('access_token',$_REQUEST['sessionId'])->value('access_token')){
		AuthServer::where('access_token',$_REQUEST['sessionId'])->update(['session' => $_REQUEST['serverId'], 'server' => $_REQUEST['sessionId']]);
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
