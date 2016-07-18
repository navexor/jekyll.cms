<?php

namespace App\Http\Controllers;

use App\Forms\PostForm;
use App\Http\Requests;
use App\Repositories\Post;

class PostController extends Controller
{
    private $postRepo;
    private $postForm;

    public function __construct(
        Post $postRepository,
        PostForm $postForm
    )
    {
        $this->postRepo = $postRepository;
        $this->postForm = $postForm;
    }

    public function index()
    {
        $posts = $this->postRepo->all();
        var_dump($posts);

        return view('posts.index')
            ->with('posts', $posts);
    }

    public function edit($id)
    {
        $post = $this->postRepo->find($id);
        return view('posts.edit')
            ->with('post', $post);
    }

    public function update($id)
    {
        $post = $this->postForm->update($id, \Request::all());
        if (is_null($post)) {
            return \Redirect::action('PostController@edit', [$id])
                ->withErrors($this->postForm->errors())
                ->withInput();
        } else {
            $redirect = \Redirect::action('PostController@index');
            return $redirect->with('alert_success', trans('Post has been updated successfully'));
        }
    }
}
