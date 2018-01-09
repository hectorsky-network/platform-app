<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

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

    protected function create(Request $request)
    {

        $validator = Validator::make($request->all());

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
        $validator = Validator::make($request->all());

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
