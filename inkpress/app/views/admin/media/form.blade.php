        @include('admin._partials.failure')

        <fieldset class="row">
            <div class="form-group col-xs-12 col-sm-4">
                {{ Form::label('alt', trans('media.alt')) }}

                @if (empty($media->alt))
                    {{ Form::text('alt', '', array('class' => 'form-control')) }}
                @else
                    {{ Form::text('alt', $media->alt, array('class' => 'form-control')) }}
                @endif
            </div>

            <div class="form-group col-xs-12 col-sm-4">
                {{ Form::label('title', trans('media.title')) }}

                @if (empty($media->title))
                    {{ Form::text('title', '', array('class' => 'form-control')) }}
                @else
                    {{ Form::text('title', $media->title, array('class' => 'form-control')) }}
                @endif
            </div>

            <div class="form-group col-xs-12 col-sm-4">
                {{ Form::label('type', trans('media.type')) }}

                @if (empty($media->type))
                    {{ Form::text('type', '', array('class' => 'form-control')) }}
                @else
                    {{ Form::text('type', $media->type, array('class' => 'form-control')) }}
                @endif
            </div>
        </fieldset>

        <fieldset class="row">
            <div class="form-group col-xs-12 col-sm-8">
                {{ Form::label('caption', trans('media.caption')) }}

                @if (empty($media->caption))
                    {{ Form::textarea('caption', '', array('class' => 'form-control')) }}
                @else
                    {{ Form::textarea('caption', $media->caption, array('class' => 'form-control')) }}
                @endif
            </div>

            <div class="form-group col-xs-12 col-sm-4">
                {{ Form::label('filename', trans('media.filename')) }} *

                @if (empty($media->filename))
                    {{ Form::file('filename', '', array('class' => 'form-control')) }}
                @else
                    <img alt="{{ $media->alt }}" src="/{{ $media->path }}/{{ $media->filename }}" title="{{ $media->title }}" width="250">
                    {{ Form::hidden('filename', $media->filename) }}
                @endif
            </div>
            {{ Form::hidden('path', 'uploads') }}
        </fieldset>

        @include('admin._partials.save-close')
