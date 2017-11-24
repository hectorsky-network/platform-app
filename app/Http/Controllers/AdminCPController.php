<?php

namespace App\Http\Controllers;

use App\AuthServer;
use App\Skin;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AdminCPController extends Controller
{
    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = 'admin/users';

    function index(){
            return view('admin\home');
    }

    function users(){
        $users = User::all();
        $games = AuthServer::all();
        $skins = Skin::all();
        return view('admin/users')->with(compact('users'))
            ->with(compact('games'))
            ->with(compact('skins'));
    }
    function adduser(){
        return view('admin\adduser');
    }
    function edituser($id){
        $user = User::find($id);
        return view('admin\edituser')->with(compact('user'));
    }

    protected function createuser(Request $request)
    {
        $rules = [
            'name' => 'required|string|regex:/^[a-zA-Z-0-9-_]+$/u|max:20|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ];

        $messages = [
            'name_first.required'   =>  'Your first name is required.',
            'name_last.required'    =>  'Your last name is required.',
            'email.required'        =>  'Your emails address is required.',
            'email.unique'          =>  'That email address is already in use.',
            'name.required'     =>  'Your username is required.',
            'name.unique'       =>  'That username is already in use.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

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
                'access_token' => '000',
                'client_token' => '000',
                'session' => '000',
                'server' => '000',
            ]);
            Session::flash('success', 'Your profile was updated.');
            return Redirect::to('/admin/users');
        }
    }

    public function updateprofile(Request $request, $id)
    {

        $rules = [
            'name' => 'required|string|regex:/^[a-zA-Z-0-9-_]+$/u|max:20|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ];

        $messages = [
            'name_first.required' => 'Your first name is required.',
            'name_last.required' => 'Your last name is required.',
            'email.required' => 'Your emails address is required.',
            'email.unique' => 'That email address is already in use.',
            'name.required' => 'Your username is required.',
            'name.unique' => 'That username is already in use.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return Redirect::to('/admin/users/edit/'.$id)
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

    function deleteuser($id){
        if($id == 1) {
            abort(404);
        }else{
            $user = User::find($id);
            $user->delete();
            $gmp = AuthServer::find($id);
            $gmp->delete();
            $skin = Skin::find($id);
            $skin->delete();
            return redirect('admin/users');
        }

    }

    function deleteskin($id){
            $skin = Skin::find($id);
            $skin->skin = '0000000000000000000000000000000f';
            $skin->save();
            return redirect('admin/users');

    }

    function deletecape($id){
        $skin = Skin::find($id);
        $skin->cape = '0000000000000000000000000000000f';
        $skin->save();
        return redirect('admin/users');

    }
}
