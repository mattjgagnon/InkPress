        @include('admin._partials.failure')
        <fieldset class="row">
            <div class="form-group col-sm-6">
                {{ Form::label('first_name', trans('users.first-name')) }}

                @if (empty($user))
                    {{ Form::text('first_name', '', array('class' => 'form-control')) }}
                @else
                    {{ Form::text('first_name', $user->first_name, array('class' => 'form-control')) }}
                @endif
            </div>

            <div class="form-group col-sm-6">
                {{ Form::label('last_name', trans('users.last-name')) }}

                @if (empty($user))
                    {{ Form::text('last_name', '', array('class' => 'form-control')) }}
                @else
                    {{ Form::text('last_name', $user->last_name, array('class' => 'form-control')) }}
                @endif
            </div>
        </fieldset>

        <fieldset class="row">
            <div class="form-group col-sm-6">
                {{ Form::label('email', trans('users.email')) }} *

                @if (empty($user))
                    {{ Form::text('email', '', $attributes = array('class' => 'form-control required')) }}
                @else
                    {{ Form::text('email', $user->email, $attributes = array('class' => 'form-control required')) }}
                @endif
                <span class="help-block">{{ trans('users.email-help') }}</span>
            </div>

            <div class="form-group col-sm-6">
                {{ Form::label('password', trans('users.password')) }} *

                @if (empty($user))
                    {{ Form::password('password', $attributes = array('class' => 'form-control required')) }}
                @else
                    {{ Form::password('password', $attributes = array('class' => 'form-control required')) }}
                @endif
                <span class="help-block">{{ trans('users.password-help') }}</span>
            </div>
        </fieldset>

        @include('admin._partials.save-close')
