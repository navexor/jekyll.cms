<?php

namespace App\Repositories;
use App\Repositories\Post\PostParser;
use Symfony\Component\HttpFoundation\File\Exception\FileNotFoundException;

/**
 * Created by PhpStorm.
 * User: oleg
 * Date: 30.05.2016
 * Time: 22:14
 */
class Post
{
    private $_options;
    private $_files = [];
    private $_posts = [];
    private $_parser;

    public function __construct(
        array $options,
        PostParser $postParser
    )
    {
        $this->_options = $options;
        $this->_files = $this->scanPosts($this->_options['main_dir'] . $this->_options['posts_dir']);
        $this->_parser = $postParser;
    }

    public function all()
    {
        $files = $this->_files or [];
        foreach ($files as $file) {
            $this->_posts[$file] = $this->getPostInfo($file);
        }
        return $this->_posts;
    }

    public function createOrUpdate()
    {

    }

    public function delete()
    {

    }

    private function scanPosts($dir, &$results = array()){
        $files = scandir($dir);

        foreach($files as $key => $value){
            $path = realpath($dir.DIRECTORY_SEPARATOR.$value);
            if(!is_dir($path)) {
                $results[] = $path;
            } else if($value != "." && $value != "..") {
                $this->scanPosts($path, $results);
            }
        }

        return $results;
    }

    private function getPostInfo($filename)
    {
        try {
            $content = \File::get($filename);
        } catch (FileNotFoundException $exception) {
            die("The file doesn't exist");
        }
        $parsedContent = $this->_parser->parseFile($content);

        return $parsedContent;
    }

}