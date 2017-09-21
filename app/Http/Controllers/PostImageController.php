<?php

namespace App\Http\Controllers;

use App\Forms\PostImageForm;
use App\Repositories\PostImage;

class PostImageController extends Controller
{
    private $postImageRepo;
    private $postImageForm;

    public function __construct(
        PostImage $postRepository,
        PostImageForm $postForm
    )
    {
        $this->postImageRepo = $postRepository;
        $this->postImageForm = $postForm;
    }

    public function store()
    {
        $files = $this->postImageRepo->getFilesFromInput(array_get($_FILES, 'image'));
        $postImages = $this->saveImages($files);

        return $this->makeResponse($postImages);
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

    private function saveImages($files = [])
    {
        $out = [];

        foreach ($files as $file) {
            $out[] = $this->postImageForm->create($file);
        }

        return $out;
    }


    private function makeResponse($response)
    {

    }
}
