<?php

namespace App\Http\Controllers;

use App\Modpack;
use App\Skin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function ownedModpacks(){
        $myModpacks = Modpack::where('owner',Auth::user()->id)->get();
        return view('user.modpacks')->with(compact('myModpacks'));
    }

    public function index(){
        return view('user.settings');
    }

    public function updateSkin(){
        list($width, $height) = getimagesize(Input::file('skin'));
        if($height > 64 || $width > 64){
            Session::flash('bad', 'Plik skórki jest za duży, musi on mieć przynajmniej rozmiar 64x32 i być w formacie PNG.');
        }else{
            $skinid = bin2hex(openssl_random_pseudo_bytes(16));
            $user = Skin::find(Auth::user()->id);
            $user->skin = $skinid;
            $user->save();
            Storage::putFileAs('public/skins/', Input::file('skin'),$skinid);
            Session::flash('success', 'Pomyślnie zmieniono skórkę!');
        };
        return view('user.skinchange');
    }

    public function changeSkin(){
        return view('user.skinchange');
    }
}
