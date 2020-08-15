        @include('admin._partials.failure')

        <fieldset class="row">
            <div class="form-group col-xs-12 col-sm-6">
                {{ Form::label('title', trans('tags.title')) }} *

                @if (empty($tag))
                    {{ Form::text('title', '', array('class' => 'form-control')) }}
                @else
                    {{ Form::text('title', $tag->title, array('class' => 'form-control')) }}
                @endif
                <p class="help-block">{{ trans('admin.valid-required') }} {{ trans('admin.valid-alphanumdash') }}</p>

                @include('admin._partials.save-close')
            </div>
        </fieldset>
