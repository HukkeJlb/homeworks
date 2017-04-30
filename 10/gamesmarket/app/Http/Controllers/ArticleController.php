<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $article = Article::all();
        $data["articles"] = $article;
        return view("admin.articles.index",$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.articles.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:5',
            'text' => 'required|min:400',
        ]);
        $article = new Article();
        $article->title = $request->input('title');
        $article->text = $request->input('text');
        if($request->hasFile('photo')) {
            $file = $request->file('photo');
            $file->move(public_path() . '/img/news',$request->file('photo')->getClientOriginalName());
            $article->photo = $request->file('photo')->getClientOriginalName();
        }
        $article->save();

        return redirect('/admin/articles');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article_id
     * @return \Illuminate\Http\Response
     */
    public function show($article_id)
    {
        try {
            $article = Article::findOrFail($article_id);
        } catch (Exception $e) {
            return abort(404);
        }
        $data['article'] = $article;
        return view("admin.articles.show",$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article_id
     * @return \Illuminate\Http\Response
     */
    public function edit($article_id)
    {
        try {
            $article = Article::findOrFail($article_id);
        } catch (Exception $e) {
            return abort(404);
        }
        $data['article'] = $article;
        return view("admin.articles.edit",$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $article_id)
    {
        $this->validate($request, [
            'title' => 'required|min:5',
            'text' => 'required|min:400',
        ]);
        try {
            $article = Article::findOrFail($article_id);
        } catch (Exception $e) {
            return abort(404);
        }
        $article->title = $request->input('title');
        $article->text = $request->input('text');
        if($request->hasFile('photo')) {
            $file = $request->file('photo');
            $file->move(public_path() . '/img/news',$request->file('photo')->getClientOriginalName());
            $article->photo = $request->file('photo')->getClientOriginalName();
        }
        $article->save();
        return redirect('/admin/articles/edit/'.$article_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($article_id)
    {
        try {
            $article = Article::findOrFail($article_id);
            Article::destroy($article->id);
        } catch (Exception $e) {
            return abort(404);
        }

        return redirect('/admin/articles');
    }
}
