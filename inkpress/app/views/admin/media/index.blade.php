@extends('admin._layouts.default')

@section('title')
    {{ trans('media.name') }}
@stop

@section('main')

{{-- Display a template for successful submissions --}}
@include('admin._partials.success')

<div class="container-fluid">
    <header class="page-header row">
        <h1 class="col-sm-2">{{ trans('media.name') }}</h1>
        <a class="btn btn-primary col-sm-offset-8 col-sm-2" href="{{ URL::route('admin.media.create') }}">{{ trans('admin.upload') }} {{ trans('media.name') }}</a>
    </header>

    <div class="row">
    @foreach ($media as $item)
        <div class="col-xs-12 col-sm-4 col-md-3">
            <a href="{{ URL::route('admin.media.show', $item->id) }}"><img alt="{{ $item->filename }}" src="/uploads/{{ $item->filename }}" width="200"></a>
            <p>Created: {{ $item->created_at }}</p>
            <div class="row">
                <button type="button" class="btn col-xs-2 col-sm-offset-1 col-sm-4 btn-danger" data-toggle="modal" data-target="#delete-{{ $item->id }}">
                    {{ trans('admin.delete') }}
                </button>
                <div class=" col-xs-6">
                    <a href="{{ URL::route('admin.media.edit', $item->id) }}" class="btn btn-success">{{ trans('admin.edit') }}</a>
                </div>
            </div>
        </div>
        {{-- Display a popup modal to delete the item. Params are the controller route and model data --}}
        @if (!empty($item))
            @include('admin._partials.modal-delete', array('route' => 'admin.media.destroy', 'data' => $item->id))
        @endif
    @endforeach
    </div>

</div>

@stop
