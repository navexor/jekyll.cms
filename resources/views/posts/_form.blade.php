{{ Form::open(['method' => 'post']) }}

    {{ Form::hidden('layout', $post['layout']) }}

    <div class="form-group">
        {{ Form::label('title') }}
        {{ Form::text('title', $post['title'], ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('content') }}
        {{ Form::textarea('content', $post['content'], ['class' => 'form-control ckeditor', 'data-token' => csrf_token()]) }}
    </div>

    <div class="form-group">
        {{ Form::label('categories') }}
        {{ Form::text('categories', $post['categories'], ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('tags') }}
        {{ Form::text('tags', $post['tags'], ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('author') }}
        {{ Form::text('author', $post['author'], ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('date') }}
        {{ Form::text('date', $post['date'], ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::submit('Save', ['class' => 'btn btn-primary']) }}
    </div>

{{ Form::close() }}