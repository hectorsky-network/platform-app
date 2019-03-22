<?php

namespace App\Http\Controllers;

use App\AuthServer;
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
        $myModpacks = Modpack::where('owner',Auth::user()->id)->get();
        return view('user.settings')->with(compact('myModpacks'));
    }

    public function updateSkin(){
        if(!empty(Input::file('skin'))){
            list($width, $height) = getimagesize(Input::file('skin'));
            if($height > 128 || $width > 128){
                Session::flash('bad', 'Plik skórki jest za duży, musi on mieć przynajmniej rozmiar 64x32 i być w formacie PNG.');
            }else{
                $skinid = bin2hex(openssl_random_pseudo_bytes(16));
                $user = Skin::find(Auth::user()->id);
                if($user->skin !== "0000000000000000000000000000000f") {
                    Storage::delete('public/skins/' . $user->skin);
                }
                $user->skin = $skinid;

                if(Input::get('skin_type') === '1')
                    $user->skin_type = 'slim';
                else{
                    $user->skin_type = 'steve';
                }

                $user->save();
                Storage::putFileAs('public/skins/', Input::file('skin'),$skinid);
                Session::flash('success', 'Pomyślnie zmieniono skórkę!');
            };
        }else{
            Session::flash('bad', 'Niewskazano pliku skórki, wskaż plik i pamiętaj, że musi on mieć przynajmniej rozmiar 64x32 i być w formacie PNG.');
        }
        return view('user.skinchange');
    }

    public function invalidateToken($id)
    {
        $user = AuthServer::find(Auth::user()->id);

        if ($id == 1){
            if(!empty($user->client_token)){
                $user->access_token = NULL;
                $user->client_token = NULL;
                $user->save();
                return redirect('settings/tokens')->with('status', 'Usuniętego urządzenie numer 1');
            }else{
                return redirect('settings/tokens')->with('status', 'Nie można unieważnić pustego tokena.');
            }
        }
        if ($id == 2){
            if(!empty($user->client_token_2)){
                $user->access_token_2 = NULL;
                $user->client_token_2 = NULL;
                $user->save();
                return redirect('settings/tokens')->with('status', 'Usuniętego urządzenie numer 2');
            }else{
                return redirect('settings/tokens')->with('status', 'Nie można unieważnić pustego tokena.');
            }
        }
        if ($id == 3){
            if(!empty($user->client_token_3)){
                $user->access_token_3 = NULL;
                $user->client_token_3 = NULL;
                $user->save();
                return redirect('settings/tokens')->with('status', 'Usuniętego urządzenie numer 1');
            }else{
                return redirect('settings/tokens')->with('status', 'Nie można unieważnić pustego tokena.');
            }
        }

        if ($id == 'all'){
            if(!empty($user->client_token) AND !empty($user->client_token_2) AND !empty($user->client_token_3)){
                $user->access_token = NULL;
                $user->client_token = NULL;
                $user->access_token_2 = NULL;
                $user->client_token_2 = NULL;
                $user->access_token_3 = NULL;
                $user->client_token_3 = NULL;
                $user->save();
                return redirect('settings/tokens')->with('status', 'Uneiważniono wszystkie tokeny!');
            }else{
                return redirect('settings/tokens')->with('status', 'Nie można unieważnić pustych tokenów.');
            }
        }

        if(empty($id) OR $id > 3){
            return redirect('settings/tokens')->with('status', 'Podany token nie istnieje');
        }
    }

    public function changeSkin(){
        return view('user.skinchange');
    }

    public function viewTokens(){
        return view('user.tokens');
    }
}
