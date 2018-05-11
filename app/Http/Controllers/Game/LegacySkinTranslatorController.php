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
		header("Content-Type: image/png");
		imagepng($im);
		imagedestroy($im);

	}
	
	public function cloakTranslate($name){
		$cape = Skin::where('id',User::where('name',$name)->value('id'))->value('cape');
		$im = imagecreatefrompng(public_path().'/storage/capes/'.$cape);
		imagesavealpha($im,true);
		header("Content-Type: image/png");
		imagepng($im);
		imagedestroy($im);
	}
}
