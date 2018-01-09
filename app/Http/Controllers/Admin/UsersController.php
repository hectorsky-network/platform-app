<?php

namespace App\Http\Controllers\Admin;

use App\AuthServer;
use App\Skin;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    // List users
    function index(){
        $users = User::paginate(10);
        $games = AuthServer::paginate(10);
        $skins = Skin::paginate(10);
        return view('admin.users')->with(compact('users'))
            ->with(compact('games'))
            ->with(compact('skins'));
    }

    function add(){
        return view('admin.adding.adduser');
    }

    function edit($id){
        $user = User::find($id);
        return view('admin.editing.edituser')->with(compact('user'));
    }

    function delete($id){
        if($id == 1) {
            abort(404);
        }else{
            $user = User::find($id);
            $user->delete();
            $gmp = AuthServer::find($id);
            $gmp->delete();
            $skin = Skin::find($id);
            $skin->delete();
            Session::flash('success', 'Pomyślnie usunięto użytkownika!');
            return redirect('admin/users');
        }

    }

    function deleteskin($id){
        $skin = Skin::find($id);
        $skin->skin = '0000000000000000000000000000000f';
        $skin->save();
        if($skin->skin !== "0000000000000000000000000000000f") {
            Storage::delete('public/skins/'.$skin->skin);
        }
        Session::flash('success', 'Pomyślnie usunięto skórkę!');
        return redirect('admin/users');

    }

    function deletecape($id){
        $skin = Skin::find($id);
        $skin->cape = '0000000000000000000000000000000f';
        $skin->save();
        if($skin->cape !== "0000000000000000000000000000000f") {
            Storage::delete('public/capes/'.$skin->cape);
        }
        Session::flash('success', 'Pomyślnie usunięto pelerynkę!');
        return redirect('admin/users');

    }

    //create user
    protected function create(Request $request)
    {
        $rules = [
            'name' => 'required|string|regex:/^[a-zA-Z-0-9-_]+$/u|max:20|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails())
        {
            return Redirect::to('/admin/users/add')
                ->withErrors($validator)
                ->withInput();
        }else{
            $user = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('password')),
                'isAdmin' => 0
            ]);
            $playerskin = Skin::create([
                'skin' => '0000000000000000000000000000000f',
                'cape'=> '0000000000000000000000000000000f',
            ]);
            $session_create = AuthServer::create([
                'uuid' => bin2hex(openssl_random_pseudo_bytes(16)),
            ]);
            Session::flash('success', 'Pomyślnie utworzono użytkownika '.$request->input('name').'!');
            return Redirect::to('/admin/users');
        }
    }

    public function update(Request $request, $id)
    {

        $rules = [
            'name' => 'required|string|regex:/^[a-zA-Z-0-9-_]+$/u|max:20',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('/admin/users/editing/'.$id)
                ->withErrors($validator)
                ->withInput();
        } else {
            $user = User::find($id);
            if ($user->email !== $request->input('email')) {
                $user->email = $request->input('email');
            }
            if ($user->name !== $request->input('name')) {
                $user->name = $request->input('name');
            }
            if (!$request->input('password') == '') {
                $user->password = bcrypt($request->input('password'));
            }
            $user->save();

            Session::flash('success', 'Your profile was updated.');
            return Redirect::to('/admin/users');
        }
    }


}
