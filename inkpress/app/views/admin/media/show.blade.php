@extends('admin._layouts.default')

@section('title')
    {{ trans('admin.show') }} {{ trans('media.name') }}
@stop

@section('main')

<div class="container-fluid">
    <header class="page-header row">
        <h1 class="col-sm-12">{{ trans('admin.show') }} {{ trans('media.name') }}</h1>
    </header>

    <div class="jumbotron">
        <h2>{{ trans('media.alt') }}</h2>
        <p>{{ $media->alt }}</p>
        <h2>{{ trans('media.caption') }}</h2>
        <p>{{ $media->caption }}</p>
        <h2>{{ trans('media.filename') }}</h2>
        <p>{{ $media->filename }}</p>
        <h2>{{ trans('media.path') }}</h2>
        <p>{{ $media->path }}</p>
        <h2>{{ trans('media.title') }}</h2>
        <p>{{ $media->title }}</p>

        <img alt="{{ $media->alt }}" src="/{{ $media->path }}/{{ $media->filename }}" title="{{ $media->title }}">
    </div>

    <div class="form-actions">
        <a href="{{ URL::route('admin.media.index') }}" class="btn btn-default">{{ trans('admin.back') }}</a>
    </div>
</div>

@stop
