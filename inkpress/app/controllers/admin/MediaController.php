<?php

namespace App\Controllers\Admin;

use App\Models\Media;
use App\Services\Validators\MediaValidator;
use Input, Redirect, Session;

class MediaController extends \BaseController
{
    // to validate media
    private $validation;

    // inject the validation dependency
    public function __construct(Media $media, MediaValidator $validation)
    {
        $this->media = $media;
        $this->validation = $validation;
    }

    /**
     * Upload media.
     *
     * @return view
     */
    public function create()
    {
        return \View::make('admin.media.upload');
    }

    /**
     * Delete media.
     *
     * @param int $id
     * @return view
     */
    public function destroy($id)
    {
        // find the id in this model
        $this->media = $this->media->find($id);

        // delete reference in db
        $this->media->delete();

        // delete reference in filesystem
        unlink($this->media->path.'/'.$this->media->filename);

        // flash a message to session to notify user
        Session::flash('success', trans('media.destroy-success'));
        return Redirect::route('admin.media.index');
    }

    /**
     * Edit media.
     *
     * @param int $id
     * @return view
     */
    public function edit($id)
    {
        return \View::make('admin.media.edit')->with('media', $this->media->find($id));
    }

    /**
     * Show media dashboard and all media.
     *
     * @return view
     */
    public function index()
    {
        return \View::make('admin.media.index')->with('media', $this->media->all());
    }

    /**
     * Show a single media element.
     *
     * @param int $id
     * @return view
     */
    public function show($id)
    {
        return \View::make('admin.media.show')->with('media', $this->media->find($id));
    }

    /**
     * Store a new media from create form.
     *
     * @return view
     */
    public function store()
    {
        if ($this->validation->passes())
        {
            // get all the form fields and save them in the model
            $this->media->alt         = Input::get('alt');
            $this->media->caption     = Input::get('caption');
            $this->media->filename    = Input::file('filename')->getClientOriginalName();
            $this->media->path        = Input::get('path');
            $this->media->title       = Input::get('title');
            $this->media->type        = Input::get('type');
            $this->media->save();

            // move the file to the upload folder
            Input::file('filename')->move($this->media->path, $this->media->filename);

            // flash a message to session to notify user
            // redirect back to index page with success
            Session::flash('success', trans('media.store-success'));
            return Redirect::route('admin.media.index');
        } else {
            // flash a message to session to notify user
            // redirect back to upload page with errors
            Session::flash('error', trans('media.store-failure'));
            return Redirect::back()->withInput()->withErrors($this->validation->errors);
        }
    }

    /**
     * Update media from edit form.
     *
     * @param int $id
     * @return view
     */
    public function update($id)
    {
        if ($this->validation->passes())
        {
            // find the id in this model
            $this->media = $this->media->find($id);

            // get all the form fields and save them in the model
            $this->media->alt         = Input::get('alt');
            $this->media->caption     = Input::get('caption');
            $this->media->filename    = Input::get('filename');
            $this->media->path        = Input::get('path');
            $this->media->title       = Input::get('title');
            $this->media->type        = Input::get('type');
            $this->media->save();

            // flash a message to session to notify user
            // redirect back to index page with success
            Session::flash('success', trans('media.update-success'));
            return Redirect::route('admin.media.index');
        } else {
            // flash a message to session to notify user
            // redirect back to edit page with errors
            Session::flash('error', trans('media.update-failure'));
            return Redirect::back()->withInput()->withErrors($this->validation->errors);
        }
    }

}
