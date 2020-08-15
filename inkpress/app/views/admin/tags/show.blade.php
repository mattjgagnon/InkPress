@extends('admin._layouts.default')

@section('title')
    {{ trans('admin.show') }} {{ trans('tags.name') }}
@stop

@section('main')

<div class="container-fluid">
    <header class="page-header row">
        <h1 class="col-sm-12">{{ trans('admin.show') }} {{ trans('tags.name') }}</h1>
    </header>

    <div class="jumbotron">
        <h2>{{ $tag->title }}</h2>

        {{ $tag->body }}
    </div>

    <div class="form-actions">
        <a href="{{ URL::route('admin.tags.index') }}" class="btn btn-default">{{ trans('admin.back') }}</a>
    </div>
</div>

@stop
