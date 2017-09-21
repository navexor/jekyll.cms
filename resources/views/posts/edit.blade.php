@extends('layouts/default')

@section('content')

    <h1>Edit {{$post['fileName']}}</h1>

    {{ Form::model($post, ['method' => 'put', 'enctype' => 'multipart/form-data', 'url' => route('posts.update', ['id' => $post['id']])]) }}
        @include('posts._form')
    {{ Form::close() }}

    {{ Form::model($post, ['method' => 'post', 'enctype' => 'multipart/form-data', 'id' => 'uploadForm', 'url' => route('post-image.store')]) }}
        <div data-method="post" data-action="{{route('post-image.store', ['id' => $post['id']])}}" data-post="{{$post['id']}}" name="photo" id="imageuploadform">
            <input hidden="true" id="fileupload" type="file" name="image[]" multiple >
            <button id="btnupload" data-click="uploadFiles"></button>
        </div>
    {{ Form::close() }}

@endsection