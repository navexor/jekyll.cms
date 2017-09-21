<?php
namespace App\Repositories;

use App\Repositories\PostImage\PostImageFile;

/**
 * Created by PhpStorm.
 * User: Oleg
 * Date: 15.08.2017
 * Time: 22:14
 */
class PostImage implements IModel
{
    protected $_fillable = [
        'file_name',
    ];

    public function __construct(
        array $options,
        PostImageFile $postImageFile
    )
    {
        $this->_options = $options;
        $this->_saver = $postImageFile;
    }

    public function create(array $data)
    {

    }

    public function update($id, array $data)
    {

    }

    public function remove($id)
    {

    }

    /**
     * @param array $files
     * @return array
     */
    public function getFilesFromInput($files = [])
    {
        $images = [];

        if (count($files)) {
            $fields = array_keys($files);
            $indexes = array_keys(array_get($files, $fields[0]));

            foreach ($indexes as $index) {
                foreach ($fields as $field) {
                    $images[$index][$field] = array_get($files, "$field.$index");
                }
            }
        }

        return $images;
    }

}