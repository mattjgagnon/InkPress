@extends('admin._layouts.default')

@section('title')
    {{ trans('admin.edit') }} {{ trans('users.name') }}
@stop

@section('main')

<div class="container-fluid">
    <header class="page-header row">
        <h1 class="col-sm-12">{{ trans('admin.edit') }}  {{ trans('users.name') }}</h1>
    </header>

    {{ Form::model($user, array('method' => 'put', 'route' => array('admin.users.update', $user->id))) }}

        @include('admin.users.form')

    {{ Form::close() }}
</div>

@stop
