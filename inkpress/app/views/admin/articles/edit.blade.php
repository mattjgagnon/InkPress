@extends('admin._layouts.default')

@section('title')
    {{ trans('admin.edit') }} {{ trans('articles.name') }}
@stop

@section('main')

<div class="container-fluid">
    <header class="page-header row">
        <h1 class="col-sm-12">{{ trans('admin.edit') }} {{ trans('articles.name') }}</h1>
    </header>

    {{ Form::model($article, array('method' => 'put', 'route' => array('admin.articles.update', $article->id))) }}

        @include('admin.articles.form')

    {{ Form::close() }}
</div>

@stop
