<?php

namespace App\Controllers\Admin;

use Input, Notification, Redirect, Sentry, Str;

class DashboardController extends \BaseController
{

    public function index()
    {
        return \View::make('admin.dashboard.index');
    }

}