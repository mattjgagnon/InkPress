<?php

namespace App\Controllers\Admin;

use App\Models\Article;
use App\Models\Tag;
use App\Services\Validators\ArticleValidator;
use Input, Redirect, Sentry, Session, Str;

class ArticlesController extends \BaseController
{
    private $validation;

    public function __construct(Article $article, ArticleValidator $validation, Tag $tag)
    {
        $this->article = $article;
        $this->tag = $tag;
        $this->validation = $validation;
    }

    /**
     * Create an article.
     *
     * @return view
     */
    public function create()
    {
        $tags = $this->tag->all();

        $tags_array = array();

        foreach ($tags as $key => $value) {
            $tags_array[$value->id] = $value->title;
        }

        return \View::make('admin.articles.create')->with('tags', $tags_array);
    }

    /**
     * Delete an article.
     *
     * @param int $id
     * @return view
     */
    public function destroy($id)
    {
        $this->article = $this->article->find($id);

        $this->article->delete();

        Session::flash('success', trans('articles.destroy-success'));
        return Redirect::route('admin.articles.index');
    }

    /**
     * Edit an article.
     *
     * @param int $id
     * @return view
     */
    public function edit($id)
    {
        $tags = $this->tag->all();

        $tags_array = array();

        foreach ($tags as $key => $value) {
            $tags_array[$value->id] = $value->title;
        }

        return \View::make('admin.articles.edit')
            ->with('article', $this->article->find($id))
            ->with('tags', $tags_array);
    }

    /**
     * Show article dashboard and all articles.
     *
     * @return view
     */
    public function index()
    {
        return \View::make('admin.articles.index')->with('articles', $this->article->all());
    }

    /**
     * Show all articles on front end.
     *
     * @return view
     */
    public function indexFront()
    {
        return \View::make('front.articles.index')->with('articles', $this->article->all());
    }

    /**
     * Show a single article.
     *
     * @param int $id
     * @return view
     */
    public function show($id)
    {
        return \View::make('admin.articles.show')->with('article', $this->article->find($id));
    }

    /**
     * Store a new article from create form.
     *
     * @return view
     */
    public function store()
    {
        if ($this->validation->passes())
        {
            $this->article->title   = Input::get('title');
            $this->article->slug    = Str::slug(Input::get('title'));
            $this->article->body    = Input::get('body');
            $this->article->user_id = Sentry::getUser()->id;
            $this->article->save();

            $tags = Input::get('tags');

            if (!empty($tags)) {
                $this->article->tag()->sync($tags);
            }

            Session::flash('success', trans('articles.store-success'));
            return Redirect::route('admin.articles.index');
        } else {
            Session::flash('error', trans('articles.store-failure'));
            return Redirect::back()->withInput()->withErrors($this->validation->errors);
        }
    }

    /**
     * Update an article from edit form.
     *
     * @param int $id
     * @return view
     */
    public function update($id)
    {
        if ($this->validation->passes())
        {
            $this->article = $this->article->find($id);

            $this->article->title   = Input::get('title');
            $this->article->slug    = Str::slug(Input::get('title'));
            $this->article->body    = Input::get('body');
            $this->article->user_id = Sentry::getUser()->id;
            $this->article->save();

            $tags = Input::get('tags');

            if (!empty($tags)) {
                $this->article->tag()->sync($tags);
            }

            Session::flash('success', trans('articles.update-success'));
            return Redirect::route('admin.articles.index');
        } else {
            Session::flash('error', trans('articles.update-failure'));
            return Redirect::back()->withInput()->withErrors($this->validation->errors);
        }
    }

}
