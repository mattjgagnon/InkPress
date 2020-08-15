        @include('admin._partials.failure')

        <fieldset class="row">
            <div class="form-group col-xs-12 col-sm-8">
                {{ Form::label('title', trans('articles.title')) }} *

                @if (empty($article))
                    {{ Form::text('title', '', array('class' => 'form-control')) }}
                @else
                    {{ Form::text('title', $article->title, array('class' => 'form-control')) }}
                @endif
            </div>

            <div class="form-group col-xs-12 col-sm-4">
                {{ Form::label('tags[]', trans('tags.name')) }}

                @if (empty($tags))
                    {{ Form::select('tags[]', $tags, '', array('class' => 'form-control')) }}
                @else
                    {{ Form::select('tags[]', $tags, $tags, array('class' => 'form-control', 'multiple' => 'multiple')) }}
                @endif
            </div>
        </fieldset>

        <fieldset class="row">
            <div class="form-group col-xs-12">
                {{ Form::label('body', trans('articles.content')) }} *

                @if (empty($article))
                    {{ Form::textarea('body', '', array('class' => 'form-control')) }}
                @else
                    {{ Form::textarea('body', $article->body, array('class' => 'form-control')) }}
                @endif
            </div>
        </fieldset>

        @include('admin._partials.save-close')
