@extends('admin._layouts.default')

@section('title')
    {{ trans('contacts.name') }}
@stop

@section('main')

{{-- Display a template for successful submissions --}}
@include('admin._partials.success')

<div class="container-fluid">
    <header class="page-header row">
        <h1 class="col-xs-12">{{ trans('contacts.name') }}</h1>
    </header>

    <div class="row">
        <div class="col-xs-12 col-sm-6">
            <strong>{{ trans('contacts.full-name') }}</strong>
        </div>
        <div class="col-xs-7 col-sm-3">
            <strong>{{ trans('articles.date-added') }}</strong>
        </div>
        <div class="col-xs-4 col-sm-2">
            <strong>{{ trans('admin.actions') }}</strong>
        </div>
    </div>
    <div class="row">
        <hr class="col-xs-12">
    </div>

    @foreach ($contacts as $contact)
    <div class="row">
        <div class="col-xs-12 col-sm-6">
            <a href="{{ URL::route('admin.contacts.show', $contact->id) }}">{{ $contact->name }}</a>
        </div>
        <div class="col-xs-7 col-sm-3">
            {{ $contact->created_at }}
        </div>
        <div class="col-xs-2 col-sm-1">
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete-{{ $contact->id }}">
                {{ trans('admin.delete') }}
            </button>
        </div>
    </div>
    <div class="row">
        <hr class="col-xs-12">
    </div>

    {{-- Display a popup modal to delete the item. Params are the controller route and model data --}}
    @if (!empty($contact))
        @include('admin._partials.modal-delete', array('route' => 'admin.contacts.destroy', 'data' => $contact->id))
    @endif

    @endforeach

</div>

@stop
