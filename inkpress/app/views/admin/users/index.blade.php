@extends('admin._layouts.default')

@section('title')
    {{ trans('users.name') }}
@stop

@section('main')

{{-- Display a template for successful submissions --}}
@include('admin._partials.success')

<div class="container-fluid">
    <header class="page-header row">
        <h1 class="col-sm-2">{{ trans('users.name') }}</h1>
        <a class="btn btn-primary col-sm-offset-8 col-sm-2" href="{{ URL::route('admin.users.create') }}">{{ trans('admin.create') }} {{ trans('users.name') }}</a>
    </header>

    <div class="row">
        <div class="col-xs-6 col-sm-3">
            <strong>{{ trans('users.fullname') }}</strong>
        </div>
        <div class="col-xs-6 col-sm-3">
            <strong>{{ trans('users.email') }}</strong>
        </div>
        <div class="col-xs-6 col-sm-3">
            <strong>{{ trans('users.date-added') }}</strong>
        </div>
        <div class="col-xs-6 col-sm-3">
            <strong>{{ trans('admin.actions') }}</strong>
        </div>
        <hr class="col-xs-12">
    </div>

    @foreach ($users as $user)
    <div class="row">
        <div class="col-xs-6 col-sm-3">
            {{ $user->first_name }} {{ $user->last_name }}
        </div>
        <div class="col-xs-6 col-sm-3">
            {{ $user->email }}
        </div>
        <div class="col-xs-6 col-sm-3">
            {{ $user->created_at }}
        </div>
        <div class="col-xs-3 col-sm-1">
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete-{{ $user->id }}">
                {{ trans('admin.delete') }}
            </button>
        </div>
        <div class="col-xs-3 col-sm-1 col-sm-offset-1">
            <a href="{{ URL::route('admin.users.edit', $user->id) }}" class="btn btn-success">{{ trans('admin.edit') }}</a>
        </div>
    </div>
    <div class="row">
        <hr class="col-xs-12">
    </div>

    {{-- Display a popup modal to delete the item. Params are the controller route and model data --}}
    @if (!empty($user))
        @include('admin._partials.modal-delete', array('route' => 'admin.users.destroy', 'data' => $user->id))
    @endif

    @endforeach

</div>

@stop
