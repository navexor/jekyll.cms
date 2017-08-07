<?php
/**
 * Created by PhpStorm.
 * User: oleg
 * Date: 12.07.2016
 * Time: 22:41
 */

namespace App\Repositories\Post;


class PostFile
{
    const POST_EXTENSION = '.md';

    public function save($fileName, $content)
    {
        $path = $path_parts = pathinfo($fileName);
        \File::makeDirectory($path['dirname'], 0775, true, true);

        $bytesWritten = \File::put($fileName, $content);
        if ($bytesWritten === false) {
            throw new \Exception("Error writing to file");
        }

        return $bytesWritten;
    }

    public function remove($fileName)
    {
        return \File::delete($fileName);
    }

}