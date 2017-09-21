<?php
namespace App\Repositories\PostImage;

/**
 * Created by PhpStorm.
 * User: oleg
 * Date: 15.08.2017
 * Time: 22:41
 */
class PostImageFile
{
    public function save($fileName, $content)
    {
        $path = pathinfo($fileName);
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