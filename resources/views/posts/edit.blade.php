@extends('layouts/default')

@section('content')
    <h1>{{$post['fileName']}}</h1>

    @include('posts._form')

@endsection