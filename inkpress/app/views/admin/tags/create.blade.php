@extends('admin._layouts.default')

@section('title')
    {{ trans('admin.create') }} {{ trans('tags.name') }}
@stop

@section('main')

<div class="container-fluid">
    <header class="page-header row">
        <h1 class="col-sm-12">{{ trans('admin.create') }} {{ trans('tags.name') }}</h1>
    </header>

    {{ Form::open(array('route' => 'admin.tags.store')) }}

        @include('admin.tags.form')

    {{ Form::close() }}
</div>

@stop
