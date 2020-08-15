@extends('admin._layouts.default')

@section('title')
    {{ trans('admin.create') }} {{ trans('users.name') }}
@stop

@section('main')

<div class="container-fluid">
    <header class="page-header row">
        <h1 class="col-sm-12">{{ trans('admin.create') }} {{ trans('users.name') }}</h1>
    </header>

    {{ Form::open(array('route' => 'admin.users.store')) }}

        @include('admin.users.form')

    {{ Form::close() }}
</div>

@stop
