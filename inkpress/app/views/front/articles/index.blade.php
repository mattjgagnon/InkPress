@extends('front._layouts.default')

@section('title')
    {{ trans('articles.name') }}
@stop

@section('main')

<div class="container-fluid">
    <header class="page-header row">
        <h1 class="col-xs-12">{{ trans('articles.name') }}</h1>
    </header>

    <div class="row">
    @foreach ($articles as $article)
        <header class="page-header row">
            <h2 class="col-xs-12">{{ $article->title }}</h2>
        </header>
        <div class="row">
            <div class="col-xs-12">
            {{ $article->body }}
            </div>
        </div>
    @endforeach
    </div>

</div>

@stop
