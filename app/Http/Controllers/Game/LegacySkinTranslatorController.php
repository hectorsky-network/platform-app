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
            if($skin !== '0000000000000000000000000000000f') {
                header("Content-Type: image/png");
				print file_get_contents(public_path() . '/storage/skins/' . $skin);
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
                header("Content-Type: image/png");
				print file_get_contents(public_path() . '/storage/capes/' . $cape);
            }else{
                abort(404);
            }
        }else{
            abort(404);
        }
	}
}
