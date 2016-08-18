{{ Form::hidden('layout') }}

@if (count($errors))
    <ul class="list-group">
        @foreach($errors->all() as $error)
            <li class="list-group-item list-group-item-danger">{{$error}}</li>
        @endforeach
    </ul>
@endif

<div class="form-group">
    {{ Form::label('title') }}
    {{ Form::text('title', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('fileName') }}
    {{ Form::text('fileName', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('content') }}
    {{ Form::textarea('content', null, ['class' => 'form-control ckeditor', 'data-token' => csrf_token()]) }}
</div>

<div class="form-group">
    {{ Form::label('categories') }}
    {{ Form::text('categories', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('tags') }}
    {{ Form::text('tags', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('author') }}
    {{ Form::text('author', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('date') }}
    {{ Form::text('date', null, ['class' => 'form-control', 'data-datetimepicker' => 'true']) }}
</div>

<div class="form-group">
    {{ Form::submit('Save', ['class' => 'btn btn-primary']) }}
    <a class="btn" href="{{action('PostController@index')}}">Cancel</a>
</div>