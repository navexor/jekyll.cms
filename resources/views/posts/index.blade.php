@extends('layouts/default')

@section('content')
    <h1>Posts</h1>

    @include('posts._list')

    <a href="{{route('posts.create')}}" class="btn btn-success"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> New post</a>
@endsection