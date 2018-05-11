<?php

namespace App\Http\Controllers\Game;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\User;
use App\Skin;

class LegacySkinTranslatorController extends Controller
{
    public function skinTranslate($name){
		$skin = Skin::where('id',User::where('name',$name)->value('id'))->value('skin');
		$im = imagecreatefrompng(public_path().'/storage/skins/'.$skin);
		imagesavealpha($im,true);
		imagepng($im);
		imagedestroy($im);
		return response($name)->header('Content-Type', 'image/png');

	}
	
	public function cloakTranslate($name){
		$cape = Skin::where('id',User::where('name',$name)->value('id'))->value('cape');
		$im = imagecreatefrompng(public_path().'/storage/capes/'.$skin);
		imagesavealpha($im,true);
		imagepng($im);
		imagedestroy($im);
		return response($name)->header('Content-Type', 'image/png');
	}
}
