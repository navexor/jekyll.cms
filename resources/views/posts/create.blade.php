@extends('layouts/default')

@section('content')

    <h1>Add new post</h1>

    {{ Form::model($post, ['method' => 'post', 'url' => route('posts.store')]) }}
        @include('posts._form')
    {{ Form::close() }}

@endsection