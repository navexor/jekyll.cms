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
        var_dump($this->postRepo->all());
        return view('posts.index');
    }
}
