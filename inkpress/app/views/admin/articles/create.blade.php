@extends('admin._layouts.default')

@section('title')
    {{ trans('admin.create') }} {{ trans('articles.name') }}
@stop

@section('main')

<div class="container-fluid">
    <header class="page-header row">
        <h1 class="col-sm-12">{{ trans('admin.create') }} {{ trans('articles.name') }}</h1>
    </header>

    {{ Form::open(array('route' => 'admin.articles.store')) }}

        @include('admin.articles.form')

    {{ Form::close() }}
</div>

@stop
