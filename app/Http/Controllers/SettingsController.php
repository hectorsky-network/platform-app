<?php

namespace App\Http\Controllers;

use App\Modpack;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}
