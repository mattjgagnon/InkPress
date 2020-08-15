@extends('admin._layouts.default')

@section('title')
    {{ trans('tags.name') }}
@stop

@section('main')

{{-- Display a template for successful submissions --}}
@include('admin._partials.success')

<div class="container-fluid">
    <header class="page-header row">
        <h1 class="col-sm-2">{{ trans('tags.name') }}</h1>
        <a class="btn btn-primary col-sm-offset-8 col-sm-2" href="{{ URL::route('admin.tags.create') }}">{{ trans('admin.create') }} {{ trans('tags.name') }}</a>
    </header>

    <div class="row">
        <div class="col-xs-12 col-sm-6">
            <strong>{{ trans('tags.title') }}</strong>
        </div>
        <div class="col-xs-7 col-sm-3">
            <strong>{{ trans('tags.date-added') }}</strong>
        </div>
        <div class="col-xs-4 col-sm-2">
            <strong>{{ trans('admin.actions') }}</strong>
        </div>
    </div>
    <div class="row">
        <hr class="col-xs-12">
    </div>

    @foreach ($tags as $tag)
    <div class="row">
        <div class="col-xs-12 col-sm-6">
            <a href="{{ URL::route('admin.tags.show', $tag->id) }}">{{ $tag->title }}</a>
        </div>
        <div class="col-xs-7 col-sm-3">
            {{ $tag->created_at }}
        </div>
        <div class="col-xs-2 col-sm-1">
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete-{{ $tag->id }}">
                {{ trans('admin.delete') }}
            </button>
        </div>

        <div class="col-xs-1 col-xs-offset-1 col-sm-1">
            <a href="{{ URL::route('admin.tags.edit', $tag->id) }}" class="btn btn-success">{{ trans('admin.edit') }}</a>
        </div>
    </div>
    <div class="row">
        <hr class="col-xs-12">
    </div>

    {{-- Display a popup modal to delete the item. Params are the controller route and model data --}}
    @if (!empty($tag))
        @include('admin._partials.modal-delete', array('route' => 'admin.tags.destroy', 'data' => $tag->id))
    @endif

    @endforeach

</div>

@stop
