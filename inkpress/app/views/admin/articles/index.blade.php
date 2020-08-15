@extends('admin._layouts.default')

@section('title')
    {{ trans('articles.name') }}
@stop

@section('main')

{{-- Display a template for successful submissions --}}
@include('admin._partials.success')

<div class="container-fluid">
    <header class="page-header row">
        <h1 class="col-sm-2">{{ trans('articles.name') }}</h1>
        <a class="btn btn-primary col-sm-offset-8 col-sm-2" href="{{ URL::route('admin.articles.create') }}">{{ trans('admin.create') }} {{ trans('articles.name') }}</a>
    </header>

    <div class="row">
        <div class="col-xs-12 col-sm-6">
            <strong>{{ trans('articles.title') }}</strong>
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

    @foreach ($articles as $article)
    <div class="row">
        <div class="col-xs-12 col-sm-6">
            <a href="{{ URL::route('admin.articles.show', $article->id) }}">{{ $article->title }}</a>
        </div>
        <div class="col-xs-7 col-sm-3">
            {{ $article->created_at }}
        </div>
        <div class="col-xs-2 col-sm-1">
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete-{{ $article->id }}">
                {{ trans('admin.delete') }}
            </button>
        </div>

        <div class="col-xs-1 col-xs-offset-1 col-sm-1">
            <a href="{{ URL::route('admin.articles.edit', $article->id) }}" class="btn btn-success">{{ trans('admin.edit') }}</a>
        </div>
    </div>
    <div class="row">
        <hr class="col-xs-12">
    </div>

    {{-- Display a popup modal to delete the item. Params are the controller route and model data --}}
    @if (!empty($article))
        @include('admin._partials.modal-delete', array('route' => 'admin.articles.destroy', 'data' => $article->id))
    @endif

    @endforeach

</div>

@stop
