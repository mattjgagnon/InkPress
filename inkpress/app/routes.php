<?php

Route::get(
    '/',
    array(
        'as' => 'articles',
        'uses' => 'App\Controllers\Admin\ArticlesController@indexFront'
    )
);

Route::get(
    '/tags',
    array(
        'as' => 'tags',
        'uses' => 'App\Controllers\Admin\TagsController@allTags'
    )
);

Route::get(
    '/articles',
    array(
        'as' => 'front.articles',
        'uses' => 'App\Controllers\Admin\ArticlesController@indexFront'
    )
);

Route::get('/contact', array(
    'as'    => 'front.contacts',
    'uses'  => 'App\Controllers\Admin\ContactsController@indexFront'
));

Route::get('admin/contact', array(
    'as'    => 'admin.contacts',
    'uses'  => 'App\Controllers\Admin\ContactsController@indexFront'
));

Route::post('/contact', array(
    'as'    => 'front.contacts.post',
    'uses'  => 'App\Controllers\Admin\ContactsController@postContact'
));

Route::get('admin/logout', array(
    'as'    => 'admin.logout',
    'uses'  => 'App\Controllers\Admin\AuthController@getLogout'
));

Route::get('admin/login', array(
    'as'    => 'admin.login',
    'uses'  => 'App\Controllers\Admin\AuthController@getLogin'
));

Route::post('admin/login', array(
    'as'    => 'admin.login.post',
    'uses'  => 'App\Controllers\Admin\AuthController@postLogin'
));

Route::group(array(
    'prefix'    => 'admin',
    'before'    => 'auth.admin'), function()
{
    Route::any('/', 'App\Controllers\Admin\DashboardController@index');
    Route::resource('contacts', 'App\Controllers\Admin\ContactsController');
    Route::resource('dashboard', 'App\Controllers\Admin\DashboardController@index');
    Route::resource('articles', 'App\Controllers\Admin\ArticlesController');
    Route::resource('media', 'App\Controllers\Admin\MediaController');
    Route::resource('tags', 'App\Controllers\Admin\TagsController');
    Route::resource('users', 'App\Controllers\Admin\UsersController');
});

// protect routes auth logic
Route::filter('auth.admin', function()
{
    if ( ! Sentry::check())
    {
        return Redirect::route('admin.login');
    }
});
