<?php

namespace App\Controllers\Admin;

use App\Models\Tag;
use App\Services\Validators\TagValidator;
use Input, Redirect, Session, Str;

class TagsController extends \BaseController
{
    private $validation;

    public function __construct(Tag $tag, TagValidator $validation)
    {
        $this->tag = $tag;
        $this->validation = $validation;
    }

    /**
     * Show all tags on front end.
     *
     * @return json
     */
    public function allTags()
    {
        return \Response::json($this->tag->all());
    }

    /**
     * Create a tag.
     *
     * @return view
     */
    public function create()
    {
        return \View::make('admin.tags.create');
    }

    /**
     * Delete a tag.
     *
     * @param int $id
     * @return view
     */
    public function destroy($id)
    {
        $this->tag = $this->tag->find($id);

        $this->tag->delete();

        Session::flash('success', trans('tags.destroy-success'));
        return Redirect::route('admin.tags.index');
    }

    /**
     * Edit a tag.
     *
     * @param int $id
     * @return view
     */
    public function edit($id)
    {
        return \View::make('admin.tags.edit')->with('tag', $this->tag->find($id));
    }

    /**
     * Show tag dashboard and all tags.
     *
     * @return view
     */
    public function index()
    {
        return \View::make('admin.tags.index')->with('tags', $this->tag->all());
    }

    /**
     * Show a single tag.
     *
     * @param int $id
     * @return view
     */
    public function show($id)
    {
        return \View::make('admin.tags.show')->with('tag', $this->tag->find($id));
    }

    /**
     * Store a new tag from create form.
     *
     * @return view
     */
    public function store()
    {
        if ($this->validation->passes())
        {
            $this->tag->title   = Input::get('title');
            $this->tag->slug    = Str::slug(Input::get('title'));
            $this->tag->save();

            Session::flash('success', trans('tags.store-success'));
            return Redirect::route('admin.tags.index');
        } else {
            Session::flash('error', trans('tags.store-failure'));
            return Redirect::back()->withInput()->withErrors($this->validation->errors);
        }
    }

    /**
     * Update a tag from edit form.
     *
     * @param int $id
     * @return view
     */
    public function update($id)
    {
        if ($this->validation->passes())
        {
            $this->tag = $this->tag->find($id);

            $this->tag->title   = Input::get('title');
            $this->tag->slug    = Str::slug(Input::get('title'));
            $this->tag->save();

            Session::flash('success', trans('tags.update-success'));
            return Redirect::route('admin.tags.index');
        } else {
            Session::flash('error', trans('tags.update-failure'));
            return Redirect::back()->withInput()->withErrors($this->validation->errors);
        }
    }

}
