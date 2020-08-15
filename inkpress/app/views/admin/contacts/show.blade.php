@extends('admin._layouts.default')

@section('title')
    {{ trans('admin.show') }} {{ trans('contacts.name') }}
@stop

@section('main')

<div class="container-fluid">
    <header class="page-header row">
        <h1 class="col-sm-12">{{ trans('admin.show') }} {{ trans('contacts.name') }}</h1>
    </header>

    <div class="jumbotron">
        <p><b>{{ trans('contacts.full-name') }}</b><br> {{ $contact->name }}</p>
        <p><b>{{ trans('contacts.email') }}</b><br> <a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a></p>
        <p><b>{{ trans('contacts.subject') }}</b><br> {{ $contact->subject }}</p>
        <p><b>{{ trans('contacts.message') }}</b><br> {{ $contact->message }}</p>
    </div>

    <div class="form-actions">
        <a href="{{ URL::route('admin.contacts.index') }}" class="btn btn-default">{{ trans('admin.back') }}</a>
    </div>
</div>

@stop
