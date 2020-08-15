@extends('front._layouts.no-nav')

@section('title')
    {{ trans('admin.login') }}
@stop

@section('main')

        <header class="page-header row">
            <h1 class="col-sm-12">{{ trans('admin.login') }}</h1>
        </header>

        @include('admin._partials.failure')

        <div id="login" class="login">

            {{ Form::open() }}

            <fieldset class="row">
                <div class="form-group col-xs-12 col-sm-6">
                    {{ Form::label('email', trans('admin.email')) }}
                    {{ Form::text('email', '', array('class' => 'form-control')) }}
                </div>
            </fieldset>

            <fieldset class="row">
                <div class="form-group col-xs-12 col-sm-6">
                    {{ Form::label('password', trans('admin.password')) }}
                    {{ Form::password('password', array('class' => 'form-control')) }}
                </div>
            </fieldset>

            <fieldset class="row">
                <div class="col-xs-12 col-sm-6">
                    <div class="row">
                        <div class="col-xs-6">
                            {{ Form::submit(trans('admin.login'), array('class' => 'btn btn-primary')) }}
                        </div>
                        <div class="col-xs-6">
                            <a href="{{ URL::previous() }}" class="btn btn-default pull-right">{{ trans('admin.main-site') }}</a>
                        </div>
                    </div>
                </div>
            </fieldset>

            {{ Form::close() }}
        </div>

@stop
