<?php

namespace App\Http\Controllers;

use App\Article;
use App\Modpack;
use App\Star;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class SiteController extends Controller
{
    protected function modpackView($name){
        if (Modpack::where('id', '=', $name)->exists()) {
            $modpack = Modpack::find($name);
            return view('viewmodpack')->with(compact('modpack'));
        }else{
            return abort(404);
        }
    }

    protected function modpackStar($name){
        if (Modpack::where('id', '=', $name)->exists()) {
            $modpack = Modpack::find($name);
            if (Star::where('givenBy', '=', Auth::user()->id)->where('givenTo', '=', $name)->exists()) {
                Session::flash('success', 'No chyba nie!');
                return Redirect::to('/modpacks/modpack/' . $name);
            } else {
                $user = Star::create([
                    'givenBy' => Auth::user()->id,
                    'givenTo' => $modpack->id
                ]);
                $modpack->ratings = $modpack->ratings + 1;
                $modpack->timestamps = false;
                $modpack->save();
                Session::flash('success', 'Pomyślnie dodano gwiazdkę autorowi!');
                return Redirect::to('/modpacks/modpack/' . $name);
            }
        }else{abort(404);}
    }

    protected function modpackDelStar($name){
        if (Modpack::where('id', '=', $name)->exists()) {
            $modpack = Modpack::find($name);
            if (Star::where('givenBy', '=', Auth::user()->id)->where('givenTo', '=', $name)->exists()) {
                $usr = Star::find(Star::where('givenBy', '=', Auth::user()->id)->where('givenTo', '=', $name)->value('id'));
                $usr->delete();
                $modpack->ratings = $modpack->ratings - 1;
                $modpack->timestamps = false;
                $modpack->save();
                Session::flash('success', 'Usunięto gwiazdkę!');
                return Redirect::to('/modpacks/modpack/' . $name);
            }
        }else{abort(404);}
    }
}
