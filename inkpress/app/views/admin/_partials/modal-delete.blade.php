<div class="modal fade" id="delete-{{ $data }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>

                <h4 class="modal-title" id="myModalLabel-{{ $data }}">{{ trans('admin.delete-confirm-title') }}</h4>
            </div>
            <div class="modal-body">
                {{ trans('admin.delete-confirm') }}
            </div>
            <div class="modal-footer row">
                {{ Form::open(array('route' => array($route, $data), 'method' => 'delete', 'data-confirm' => trans('admin.delete-confirm'))) }}
                    <button type="submit" class="btn btn-primary col-xs-3 col-sm-2">
                        {{ trans('admin.delete') }}
                    </button>
                {{ Form::close() }}

                <button type="button" class="btn btn-default col-xs-3 col-sm-2 col-xs-offset-1" data-dismiss="modal">
                    {{ trans('admin.cancel') }}
                </button>
            </div>
        </div>
    </div>
</div>
