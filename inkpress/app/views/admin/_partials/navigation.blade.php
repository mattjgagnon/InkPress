<?php

if (!defined('ADMIN_URL')) {
    define('ADMIN_URL', '/admin');
}

$nav = array(
    'articles'  => array(
        'sort'  => 200,
        'text'  => trans('articles.name'),
        'url'   => ADMIN_URL.'/articles',
    ),
    'contacts'  => array(
        'sort'  => 250,
        'text'  => trans('contacts.name'),
        'url'   => ADMIN_URL.'/contacts',
    ),
    'dashboard' => array(
        'sort'  => 100,
        'text'  => trans('admin.name'),
        'url'   => ADMIN_URL,
    ),
    'logout'    => array(
        'sort'  => 1000,
        'text'  => trans('admin.logout'),
        'url'   => ADMIN_URL.'/logout',
    ),
    'media'     => array(
        'sort'  => 275,
        'text'  => trans('media.name'),
        'url'   => ADMIN_URL.'/media',
    ),
    'tags'      => array(
        'sort'  => 280,
        'text'  => trans('tags.name'),
        'url'   => ADMIN_URL.'/tags',
    ),
    'users'     => array(
        'sort'  => 300,
        'text'  => trans('users.name'),
        'url'   => ADMIN_URL.'/users',
    ),
);

asort($nav);

?>
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">{{ trans('site.name') }}</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                @foreach($nav as $item)
                <li><a href="{{ $item['url'] }}">{{ $item['text'] }}</a></li>
                @endforeach
<!--
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li class="dropdown-header">Nav header</li>
                        <li><a href="#">Separated link</a></li>
                        <li><a href="#">One more separated link</a></li>
                    </ul>
                </li>
-->
            </ul>
        </div>
    </div>
</div>
