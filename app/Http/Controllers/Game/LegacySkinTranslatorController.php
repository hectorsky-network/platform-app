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
        if(isset($name)) {
            $skin = Skin::where('id', User::where('name', $name)->value('id'))->value('skin');
            if($skin !== NULL) {
                $im = imagecreatefrompng(public_path() . '/storage/skins/' . $skin);
                imagesavealpha($im, true);
                header("Content-Type: image/png");
                imagepng($im);
                imagedestroy($im);
            }else{
                abort(404);
            }
        }else{
            abort(404);
        }

	}
	
	public function cloakTranslate($name){
        if(isset($name)) {
            $cape = Skin::where('id', User::where('name', $name)->value('id'))->value('cape');
            if($cape !== '0000000000000000000000000000000f') {
                $im = imagecreatefrompng(public_path() . '/storage/capes/' . $cape);
                imagesavealpha($im, true);
                header("Content-Type: image/png");
                imagepng($im);
                imagedestroy($im);
            }else{
                abort(404);
            }
        }else{
            abort(404);
        }
	}
}
