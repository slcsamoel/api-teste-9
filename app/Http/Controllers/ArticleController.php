<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use App\Models\Event;
use App\Models\Launche;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Article::with('launches' , 'events')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreArticleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArticleRequest $request)
    {

        $request->validated();
        $article = Article::query()->firstOrCreate($request->except('launches','events'));

        if(isset($request->launches) && !empty($request->launches)){
                foreach($request->launches as $lauche){
                    $laucheModel = new Launche();
                    $laucheModel->article_id = $article->id;
                    $laucheModel->provider = $lauche['provider'];
                    $laucheModel->save();
                }
        }

        if(isset($request->events) && !empty($request->events)){
            foreach($request->events as $event){
                $eventModel = new Event();
                $eventModel->article_id = $article->id;
                $eventModel->provider = $event['provider'];
                $eventModel->save();
            }
        }

        $article->launches = $article->launches();
        $article->events = $article->events();

        return response($article,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        $article->featured = $article->featured == 0 ? false : true ;
        $article->launches = $article->launches();
        $article->events = $article->events();
        return $article;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateArticleRequest  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        $article->featured = $article->featured == 0 ? false : true ;
        $article->launches = $article->launches();
        $article->events = $article->events();
        return $article->update($request->all()) ? response($article) : response(null,400);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return response(null , 204);
    }
}
