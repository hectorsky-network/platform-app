<?php

namespace App\Http\Controllers\Admin;

use App\AuthServer;
use App\Modpack;
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
        $users = User::paginate(20);
        return view('admin.users.users')->with(compact('users'));
    }

    function add(){
        return view('admin.adding.adduser');
    }

    function edit($id){
        $user = User::find($id);
        return view('admin.editing.edituser')->with(compact('user'));
    }

    protected function profile($id){
        if (AuthServer::where('id', '=', $id)->exists()) {
            $user = User::find($id);
            $game = AuthServer::find($id);
            $skin = Skin::find($id);
            $myModpacks = Modpack::where('owner',$id)->get();
            return view('admin.users.user')->with(compact('user'))->with(compact('game'))->with(compact('skin'))->with(compact('myModpacks'));
        }else{
            return abort(404);
        }
    }

    public function invalidateToken($id, $id2)
    {
        $user = AuthServer::find($id);

        if ($id2 == 1){
            if(!empty($user->client_token)){
                $user->access_token = NULL;
                $user->client_token = NULL;
                $user->save();
                return redirect('/admin/users/profile/'.$id)->with('status', 'Usuniętego urządzenie numer 1');
            }else{
                return redirect('/admin/users/profile/'.$id)->with('status', 'Nie można unieważnić pustego tokena.');
            }
        }
        if ($id2 == 2){
            if(!empty($user->client_token_2)){
                $user->access_token_2 = NULL;
                $user->client_token_2 = NULL;
                $user->save();
                return redirect('/admin/users/profile/'.$id)->with('status', 'Usuniętego urządzenie numer 2');
            }else{
                return redirect('/admin/users/profile/'.$id)->with('status', 'Nie można unieważnić pustego tokena.');
            }
        }
        if ($id2 == 3){
            if(!empty($user->client_token_3)){
                $user->access_token_3 = NULL;
                $user->client_token_3 = NULL;
                $user->save();
                return redirect('/admin/users/profile/'.$id)->with('status', 'Usuniętego urządzenie numer 1');
            }else{
                return redirect('/admin/users/profile/'.$id)->with('status', 'Nie można unieważnić pustego tokena.');
            }
        }

        if ($id2 == 'all'){
            if(!empty($user->client_token) OR !empty($user->client_token_2) OR !empty($user->client_token_3)){
                $user->access_token = NULL;
                $user->client_token = NULL;
                $user->access_token_2 = NULL;
                $user->client_token_2 = NULL;
                $user->access_token_3 = NULL;
                $user->client_token_3 = NULL;
                $user->save();
                return redirect('/admin/users/profile/'.$id)->with('status', 'Uneiważniono wszystkie tokeny!');
            }else{
                return redirect('/admin/users/profile/'.$id)->with('status', 'Nie można unieważnić pustych tokenów.');
            }
        }

        if(empty($id2) OR $id2 > 3){
            return redirect('/admin/users/profile/'.$id)->with('status', 'Podany token nie istnieje');
        }
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
        $skin->skin_type = 'steve';
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
                'skin_type'=> 'steve'
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
