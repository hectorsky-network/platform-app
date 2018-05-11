<?php

namespace App\Http\Controllers\Game;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AuthServer;
use App\User;

class LegacyAuthController extends Controller
{
    public function joinServer(){
		if($_REQUEST['user'] === User::where('name',$_REQUEST['user'])->value('name')){
		AuthServer::where('id',User::where('name',$_REQUEST['user'])->value('id'))->update(['session' => $_REQUEST['serverId'], 'server' => $_REQUEST['sessionId']]);
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
