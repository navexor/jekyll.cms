@extends('layouts/default')

@section('content')

    <h1>Edit {{$post['fileName']}}</h1>

    {{ Form::model($post, ['method' => 'put', 'url' => route('posts.update', ['id' => $post['id']])]) }}
        @include('posts._form')
    {{ Form::close() }}

@endsection