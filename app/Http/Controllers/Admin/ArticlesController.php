<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ArticlesController extends Controller
{
    function index(){
        $articles = Article::all();
        return view('admin.articles')->with(compact('articles'));
    }

    function add(){
        return view('admin.adding.addarticle');
    }

    function edit($id){
        $article = Article::find($id);
        return view('admin.editing.editarticle')->with(compact('article'));
    }

    // Delete modpacks
    function delete($id){
        $article = Article::find($id);
        $article->delete();
        Session::flash('success', 'Pomyślnie usunięto artykuł!');
        return redirect('admin/articles');
    }

    protected function create(Request $request)
    {
        $rules = [
            'title' => 'required',
            'text' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);

        if($validator->fails())
        {
            return Redirect::to('/admin/articles/add')
                ->withErrors($validator)
                ->withInput();
        }else{
            $article = Article::create([
                'owner' => Auth::user()->id,
                'title' => $request->input('title'),
                'text' => $request->input('text'),
                'views' => 0
            ]);
            Session::flash('success', 'Your profile was updated.');
            return Redirect::to('/admin/articles');
        }
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'title' => 'required',
            'text' => 'required',
        ];
        $validator = Validator::make($request->all(),$rules);

        if ($validator->fails()) {
            return Redirect::to('/admin/articles/editing/'.$id)
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
}
