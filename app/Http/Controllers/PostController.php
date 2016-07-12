<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Repositories\Post;

class PostController extends Controller
{
    private $postRepo;

    public function __construct(Post $postRepository)
    {
        $this->postRepo = $postRepository;
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
}
