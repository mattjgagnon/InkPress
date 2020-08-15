@extends('admin._layouts.default')

@section('title')
    {{ trans('admin.edit') }} {{ trans('media.name') }}
@stop

@section('main')

<div class="container-fluid">
    <header class="page-header row">
        <h1 class="col-sm-12">{{ trans('admin.edit') }} {{ trans('media.name') }}</h1>
    </header>

    {{ Form::model($media, array('method' => 'put', 'files' => true, 'route' => array('admin.media.update', $media->id))) }}

        @include('admin.media.form')

    {{ Form::close() }}
</div>

@stop
