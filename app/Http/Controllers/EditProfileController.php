<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\User;
use Illuminate\Support\Facades\Auth;

class EditProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('profile/editprofile');
    }

    public function update(Request $request)
    {
        $id = Auth::user()->id;
        $rules = [
            'email'                 =>  'email|unique:users',
            'name'              =>  'string|regex:/^[a-zA-Z-0-9-_]+$/u|max:20|unique:users',
            'password'          => 'min:3:required',
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
            return Redirect::to('editprofile')
                ->withErrors($validator)
                ->withInput();
        }else{
            $user = User::find($id);
            if($user->email !== $request->input('email'))
            {
                $user->email = $request->input('email');
            }
            if($user->name !== $request->input('name'))
            {
                $user->name = $request->input('name');
            }
            if ( !$request->input('password') == '')
            {
                $user->password = bcrypt($request->input('password'));
            }
            $user->save();

            Session::flash('success', 'Your profile was updated.');
            return Redirect::to('home');
        }
    }

}
