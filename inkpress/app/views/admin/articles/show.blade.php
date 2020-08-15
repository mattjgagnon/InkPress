@extends('admin._layouts.default')

@section('title')
    {{ trans('admin.show') }} {{ trans('articles.name') }}
@stop

@section('main')

<div class="container-fluid">
    <header class="page-header row">
        <h1 class="col-sm-12">{{ trans('admin.show') }} {{ trans('articles.name') }}</h1>
    </header>

    <div class="jumbotron">
        <h2>{{ $article->title }}</h2>

        {{ $article->body }}
    </div>

    <div class="form-actions">
        <a href="{{ URL::route('admin.articles.index') }}" class="btn btn-default">{{ trans('admin.back') }}</a>
    </div>
</div>

@stop
