@extends('admin._layouts.default')

@section('title')
    {{ trans('admin.edit') }} {{ trans('tags.name') }}
@stop

@section('main')

<div class="container-fluid">
    <header class="page-header row">
        <h1 class="col-sm-12">{{ trans('admin.edit') }} {{ trans('tags.name') }}</h1>
    </header>

    {{ Form::model($tag, array('method' => 'put', 'route' => array('admin.tags.update', $tag->id))) }}

        @include('admin.tags.form')

    {{ Form::close() }}
</div>

@stop
