@extends('admin._layouts.default')

@section('title')
    {{ trans('admin.upload') }} {{ trans('media.name') }}
@stop

@section('main')

<div class="container-fluid">
    <header class="page-header row">
        <h1 class="col-sm-12">{{ trans('admin.upload') }} {{ trans('media.name') }}</h1>
    </header>

    {{ Form::open(array('route' => 'admin.media.store', 'files' => true)) }}

        @include('admin.media.form')

    {{ Form::close() }}
</div>

@stop
