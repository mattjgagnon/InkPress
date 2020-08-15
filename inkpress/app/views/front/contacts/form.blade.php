@extends('front._layouts.default')

@section('title')
    {{ trans('contacts.name') }}
@stop

@section('main')

<div class="container-fluid">
    <header class="page-header row">
        <h1 class="col-sm-12">{{ trans('contacts.name-front') }}</h1>
    </header>

    {{-- Display a template for successful submissions --}}
    @include('admin._partials.success')

    {{ Form::open(array('route' => 'front.contacts.post')) }}

        @include('front._partials.failure')

        <fieldset class="row">
            <div class="form-group col-xs-12 col-sm-4">
                {{ Form::label('name', trans('contacts.full-name')) }} *

                @if (empty($contact))
                    {{ Form::text('name', '', array('class' => 'form-control')) }}
                @else
                    {{ Form::text('name', $contact->name, array('class' => 'form-control')) }}
                @endif
            </div>

            <div class="form-group col-xs-12 col-sm-4">
                {{ Form::label('email', trans('contacts.email')) }} *

                @if (empty($contact))
                    {{ Form::text('email', '', array('class' => 'form-control')) }}
                @else
                    {{ Form::text('email', $contact->email, array('class' => 'form-control')) }}
                @endif
            </div>

            <div class="form-group col-xs-12 col-sm-4">
                {{ Form::label('subject', trans('contacts.subject')) }} *

                @if (empty($contact))
                    {{ Form::text('subject', '', array('class' => 'form-control')) }}
                @else
                    {{ Form::text('subject', $contact->subject, array('class' => 'form-control')) }}
                @endif
            </div>
        </fieldset>

        <fieldset class="row">
            <div class="form-group col-xs-12">
                {{ Form::label('message', trans('contacts.message')) }} *

                @if (empty($contact))
                    {{ Form::textarea('message', '', array('class' => 'form-control')) }}
                @else
                    {{ Form::textarea('message', $contact->message, array('class' => 'form-control')) }}
                @endif
            </div>
        </fieldset>

        @include('front._partials.submit')

    {{ Form::close() }}
</div>

@stop
