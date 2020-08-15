        <fieldset class="row">
            <div class="col-xs-2 col-sm-1">
                {{ Form::submit(trans('admin.submit'), array('class' => 'btn btn-primary')) }}
            </div>

            <div class="col-xs-2 col-xs-offset-1 col-sm-1">
                <a href="{{ URL::previous() }}" class="btn btn-default">{{ trans('admin.cancel') }}</a>
            </div>
        </fieldset>
