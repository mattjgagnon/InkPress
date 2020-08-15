<?php

namespace App\Controllers\Admin;

use App\Models\User;
use App\Services\Validators\UserValidator;
use Input, Redirect, Session;

class UsersController extends \BaseController
{
    private $validation;

    public function __construct(User $user, UserValidator $validation)
    {
        $this->user = $user;
        $this->validation = $validation;
    }

    /**
     * Create a user.
     *
     * @return view
     */
    public function create()
    {
        return \View::make('admin.users.create');
    }

    /**
     * Delete a user.
     *
     * @param int $id
     * @return view
     */
    public function destroy($id)
    {
        $this->user = $this->user->find($id);

        $this->user->delete();

        Session::flash('success', trans('users.delete-success'));
        return Redirect::route('admin.users.index');
    }

    /**
     * Edit a user.
     *
     * @param int $id
     * @return view
     */
    public function edit($id)
    {
        return \View::make('admin.users.edit')->with('user', $this->user->find($id));
    }

    /**
     * Show user dashboard and all users.
     *
     * @return view
     */
    public function index()
    {
        return \View::make('admin.users.index')->with('users', $this->user->all());
    }

    /**
     * Show a single user.
     *
     * @param int $id
     * @return view
     */
    public function show($id)
    {
        return \View::make('admin.users.show')->with('user', $this->user->find($id));
    }

    /**
     * Store a new user from create form.
     *
     * @return view
     */
    public function store()
    {
        if ($this->validation->passes())
        {
            $this->user->first_name       = Input::get('first_name');
            $this->user->last_name        = Input::get('last_name');
            $this->user->email            = Input::get('email');
            $this->user->password         = Input::get('password');
            $this->user->activated        = 1;
            $this->user->save();

            Session::flash('success', trans('users.create-success'));
            return Redirect::route('admin.users.index');
        } else {
            Session::flash('error', trans('users.create-failure'));
            return Redirect::back()->withInput()->withErrors($this->validation->errors);
        }
    }

    /**
     * Update a user from edit form.
     *
     * @param int $id
     * @return view
     */
    public function update($id)
    {
        if ($this->validation->passes())
        {
            $this->user = $this->user->find($id);

            $this->user->first_name       = Input::get('first_name');
            $this->user->last_name        = Input::get('last_name');
            $this->user->email            = Input::get('email');
            $this->user->password         = Input::get('password');
            $this->user->save();

            Session::flash('success', trans('users.update-success'));
            return Redirect::route('admin.users.index');
        } else {
            Session::flash('error', trans('users.update-failure'));
            return Redirect::back()->withInput()->withErrors($this->validation->errors);
        }
    }

}
