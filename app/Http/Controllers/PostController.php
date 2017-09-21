<?php

namespace App\Http\Controllers;

use App\Forms\PostForm;
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
        return view('posts.index')
            ->with('posts', $posts);
    }

    public function edit($id)
    {
        $post = $this->postRepo->find($id);
        return view('posts.edit')
            ->with('post', $post);
    }

    public function create()
    {
        return view('posts.create')
            ->with('post', []);
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

    public function postUpload()
    {
        $files = $_FILES;
        return 'hahah';
    }

    public function store()
    {
        $post = $this->postForm->create(\Request::all());
        if (is_null($post)) {
            return \Redirect::action('PostController@create')
                ->withErrors($this->postForm->errors())
                ->withInput();
        } else {
            $redirect = \Redirect::action('PostController@index');
            return $redirect->with('alert_success', trans('Post has been added successfully'));
        }
    }

    public function destroy($id)
    {
        $post = $this->postRepo->find($id);
        $redirect = \Redirect::action('PostController@index');

        if ($post) {
            $this->postRepo->remove($id);
            return $redirect->with('alert_success', trans('Post has been removed successfully'));
        }

        return $redirect;
    }
}
