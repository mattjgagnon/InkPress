@extends('admin._layouts.default')

@section('title')
    {{ trans('admin.name') }} {{ trans('admin.dashboard') }}
@stop

@section('main')

<div class="page-header">
    <h2>{{ trans('admin.name') }} {{ trans('admin.dashboard') }}</h2>
    <p>Some ideas for dashboard content:</p>
    <ul>
        <li>Recently added articles</li>
        <li>Quick write an article</li>
        <li>Inkpress updates</li>
        <li>Latest comments pending, posted</li>
        <li>Pull in some high-level Google Analytics</li>
    </ul>
</div>

@stop
