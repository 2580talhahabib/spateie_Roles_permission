<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $article=Article::orderBy('id')->simplePaginate(10);
        return view('Article.index',compact('article'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Article.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    {

        $req->validate([
            'title'=>'required',
            'text'=>'required',
            'auther'=>'required',
        ]);
        Article::create([
            'title'=>$req->title,
            'text'=>$req->text,
            'auther'=>$req->auther,
        ]);
        return redirect()->route('articles.index')->with('success','Articel Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $edit=Article::find($id);
        return view('Article.update',compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req, string $id)
    {
        $update=Article::find($id);
        $req->validate([
            'title'=>'required',
            'text'=>'required',
            'auther'=>'required',
        ]);
       $update->update([
            'title'=>$req->title,
            'text'=>$req->text,
            'auther'=>$req->auther,
        ]);
        return redirect()->route('articles.index')->with('success','Articel Added Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $destroy=Article::find($id);
        $destroy->delete();
        return redirect()->route('articles.index')->with('success','Article Deleted Successfully');

    }
}
