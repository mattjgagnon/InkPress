<?php

if (!defined('ADMIN_URL')) {
    define('ADMIN_URL', '/admin');
}

$nav = array(
    'articles'  => array(
        'sort'  => 200,
        'text'  => trans('articles.name'),
        'url'   => '/articles',
    ),
    'contacts'  => array(
        'sort'  => 250,
        'text'  => trans('contacts.name-front'),
        'url'   => '/contact',
    ),
    'dashboard' => array(
        'sort'  => 100,
        'text'  => trans('admin.name'),
        'url'   => ADMIN_URL,
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
            </ul>
        </div>
    </div>
</div>
