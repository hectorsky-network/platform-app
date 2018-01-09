<?php

namespace App\Http\Controllers;

use App\Article;
use App\AuthServer;
use App\Modpack;
use App\Skin;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AdminCPController extends Controller
{
    function index(){
            return view('admin.home');
    }

    function articles(){
        $articles = Article::all();
        return view('admin.articles')->with(compact('articles'));
    }

    // List users
    function users(){
        $users = User::paginate(10);
        $games = AuthServer::paginate(10);
        $skins = Skin::paginate(10);
        return view('admin.users')->with(compact('users'))
            ->with(compact('games'))
            ->with(compact('skins'));
    }

    // List modpacks
    function modpacks(){
        $modpacks = Modpack::all();
        return view('admin.modpacks')->with(compact('modpacks'));
    }

    function adduser(){
        return view('admin.adduser');
    }

    function addarticle(){
        return view('admin.addarticle');
    }

    function addmodpack(){
        return view('admin.addmodpack');
    }

    function edituser($id){
        $user = User::find($id);
        return view('admin.edituser')->with(compact('user'));
    }

    function editarticle($id){
        $article = Article::find($id);
        return view('admin.editarticle')->with(compact('article'));
    }

    function editmodpack($id){
        $modpack = Modpack::find($id);
        return view('admin.editmodpack')->with(compact('modpack'));
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
            Session::flash('success', 'Pomyślnie utworzono użytkownika '.$request->input('name').'!');
            return Redirect::to('/admin/users');
        }
    }

    protected function createarticle(Request $request)
    {
        $rules = [
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
            return Redirect::to('/admin/articles/add')
                ->withErrors($validator)
                ->withInput();
        }else{
            $article = Article::create([
                'owner' => 1,
                'title' => $request->input('title'),
                'text' => $request->input('text'),
                'views' => 0
            ]);
            Session::flash('success', 'Your profile was updated.');
            return Redirect::to('/admin/articles');
        }
    }

    protected function createmodpack(Request $request)
    {
        $rules = [
            'name' => 'required|string|regex:/^[a-zA-Z-0-9-_]+$/u|max:20|unique:users',
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
            return Redirect::to('/admin/modpacks/add')
                ->withErrors($validator)
                ->withInput();
        }else{
            $user = Modpack::create([
                'owner' => $request->input('owner'),
                'name' => $request->input('name'),
                'displayName' =>$request->input('displayName'),
                'url' =>$request->input('url'),
                'platformUrl' =>$request->input('platformUrl'),
                'minecraft' =>$request->input('minecraft'),
                'ratings' => 0,
                'downloads' => 0,
                'runs' => 0,
                'description' =>$request->input('description'),
                'tags' =>$request->input('tags'),
                'isServer' =>$request->input('isServer'),
                'isOfficial' =>$request->isOfficial,
                'version' =>$request->input('version'),
                'forceDir' =>$request->forceDir,
                'feedUrl' =>$request->input('feedUrl'),
                'iconUrl' =>$request->input('iconUrl'),
                'logoUrl' =>$request->input('logoUrl'),
                'backgroundUrl' =>$request->input('backgroundUrl'),
                'solderUrl' =>$request->input('solderUrl'),
            ]);
            Session::flash('success', 'Your profile was updated.');
            return Redirect::to('/admin/modpacks');
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

    public function updatemodpack(Request $request, $id)
    {

        $rules = [
            'name' => 'required|string|regex:/^[a-zA-Z-0-9-_]+$/u|max:20|unique:users',
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
            return Redirect::to('/admin/modpacks/edit/'.$id)
                ->withErrors($validator)
                ->withInput();
        } else {
            $modpack = Modpack::find($id);
            $modpack->owner = $request->input('owner');
            $modpack->name = $request->input('name');
            $modpack->displayName = $request->input('displayName');
            $modpack->url = $request->input('url');
            $modpack->platformUrl = $request->input('platformUrl');
            $modpack->minecraft = $request->input('minecraft');
            $modpack->ratings = $request->input('ratings');
            $modpack->downloads = $request->input('downloads');
            $modpack->runs = $request->input('runs');
            $modpack->description = $request->input('description');
            $modpack->tags = $request->input('tags');
            $modpack->isServer = $request->input('isServer');
            $modpack->isOfficial = $request->isOfficial;
            $modpack->version = $request->input('version');
            $modpack->forceDir = $request->forceDir;
            $modpack->feedUrl = $request->input('feedUrl');
            $modpack->iconUrl = $request->input('iconUrl');
            $modpack->logoUrl = $request->input('logoUrl');
            $modpack->backgroundUrl = $request->input('backgroundUrl');
            $modpack->solderUrl = $request->input('solderUrl');
            $modpack->save();

            Session::flash('success', 'Your profile was updated.');
            return Redirect::to('/admin/modpacks');
        }
    }

    public function updatearticle(Request $request, $id)
    {

        $rules = [
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
            return Redirect::to('/admin/articles/edit/'.$id)
                ->withErrors($validator)
                ->withInput();
        } else {
            $article = Article::find($id);
            $article->title = $request->input('title');
            $article->text = $request->input('text');
            $article->save();

            Session::flash('success', 'Your profile was updated.');
            return Redirect::to('/admin/articles');
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
            Session::flash('success', 'Pomyślnie usunięto użytkownika!');
            return redirect('admin/users');
        }

    }

    function deletemodpack($id){
            $modpack = Modpack::find($id);
            $modpack->delete();
        Session::flash('success', 'Pomyślnie usunięto paczkę modyfikacji!');
            return redirect('admin/modpacks');
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
}
