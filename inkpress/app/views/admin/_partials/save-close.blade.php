        <fieldset class="row">
            <div class="col-xs-12">
                <div class="row">
                    <div class="col-xs-6">
                        {{ Form::submit(trans('admin.save'), array('class' => 'btn btn-primary')) }}
                    </div>

                    <div class="col-xs-6">
                        <a href="{{ URL::previous() }}" class="btn btn-default pull-right">{{ trans('admin.cancel') }}</a>
                    </div>
                </div>
            </div>
        </fieldset>
