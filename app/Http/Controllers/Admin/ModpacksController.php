<?php

namespace App\Http\Controllers\Admin;

use App\Modpack;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ModpacksController extends Controller
{
    // List modpacks
    function index(){
        $modpacks = Modpack::all();
        return view('admin.modpacks')->with(compact('modpacks'));
    }

    // View for add modpacks
    function add(){
        return view('admin.adding.addmodpack');
    }

    //View for modpacks
    function edit($id){
        $modpack = Modpack::find($id);
        return view('admin.editing.editmodpack')->with(compact('modpack'));
    }

    //Create modpacks
    protected function create(Request $request)
    {
        $rules = [
            'owner' => 'required|integer',
            'name' => 'required|string|regex:/^[a-zA-Z-0-9-_]+$/u|max:20',
            'displayName' => 'required|string',
            'minecraft' => 'required|string',
            'displayName' => 'required|string',
            'isServer' => 'required',
            'isOfficial' => 'required',
            'version' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails())
        {
            return Redirect::to('/admin/modpacks/add')
                ->withErrors($validator)
                ->withInput();
        }else{
            $user = Modpack::create([
                'owner' => $request->input('owner'),
                'name' => $request->input('name'),
                'displayName' => $request->input('displayName'),
                'url' => $request->input('url'),
                'platformUrl' => $request->input('platformUrl'),
                'minecraft' => $request->input('minecraft'),
                'description' => $request->input('description'),
                'tags' => $request->input('tags'),
                'isServer' => $request->input('isServer'),
                'isOfficial' => $request->isOfficial,
                'version' => $request->input('version'),
                'forceDir' => $request->forceDir,
                'feedUrl' => $request->input('feedUrl'),
                'iconUrl' => $request->input('iconUrl'),
                'logoUrl' => $request->input('logoUrl'),
                'backgroundUrl' => $request->input('backgroundUrl'),
                'solderUrl' => $request->input('solderUrl'),
            ]);
            Session::flash('success', 'Your profile was updated.');
            return Redirect::to('/admin/modpacks');
        }
    }

    //Update modpacks
    public function update(Request $request, $id)
    {

        $rules = [
            'name' => 'required|string|regex:/^[a-zA-Z-0-9-_]+$/u|max:20|unique:users',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('/admin/modpacks/editing/'.$id)
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

    // Delete modpacks
    function delete($id){
        $modpack = Modpack::find($id);
        $modpack->delete();
        Session::flash('success', 'Pomyślnie usunięto paczkę modyfikacji!');
        return redirect('admin/modpacks');
    }
}
