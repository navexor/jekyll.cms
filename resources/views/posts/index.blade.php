@extends('layouts/default')

@section('content')
    <h1>Posts</h1>

    <label for="article">Article</label>
    <textarea name="article" class="ckeditor" data-token="{{csrf_token()}}"></textarea>
@endsection