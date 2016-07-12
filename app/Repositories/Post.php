<?php

namespace App\Repositories;
use App\Repositories\Post\PostFile;
use App\Repositories\Post\PostParser;
use Carbon\Carbon;
use Symfony\Component\HttpFoundation\File\Exception\FileNotFoundException;

/**
 * Created by PhpStorm.
 * User: oleg
 * Date: 30.05.2016
 * Time: 22:14
 */
class Post implements IModel
{
    private $_options;
    private $_files = [];
    private $_posts = [];
    private $_parser;
    private $_saver;

    protected $_fillable = [
        'layout',
        'title',
        'content',
        'date',
        'categories',
        'tags',
        'author',
    ];

    public function __construct(
        array $options,
        PostParser $postParser,
        PostFile $postFile
    )
    {
        $this->_options = $options;
        $this->_files = $this->scanPosts($this->_options['main_dir'] . $this->_options['posts_dir']);
        $this->_parser = $postParser;
        $this->_saver = $postFile;
    }

    public function create(array $data)
    {
        $fileName = $this->generateFilePath($data);
        $fileContent = $this->renderContent($data);

        return $this->_saver->save($fileName, $fileContent);
    }

    public function update($id, array $data)
    {
        //remove the old one
        $this->remove($id);

        //save the new
        return $this->create($data);
    }

    public function remove($id)
    {
        $oldFile = $this->find($id);
        $fileName = $this->generateFilePath($oldFile);

        return $this->_saver->remove($fileName);
    }

    public function all()
    {
        $files = $this->_files or [];
        foreach ($files as $file) {
            $this->_posts[] = $this->getPostInfo($file);
        }
        return $this->_posts;
    }

    public function find($id)
    {
        foreach ($this->_files as $file) {
            if (md5($file) == $id) {
                return $this->getPostInfo($file);
            }
        }
        return false;
    }

    private function scanPosts($dir, &$results = array())
    {
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

        $parsedContent['id'] = md5($filename);
        $parsedContent['color'] = '#' . substr(md5($filename), 0, 6);
        $parsedContent['fileName'] = basename($filename, '.md');
        $parsedContent['filePath'] = $filename;

        return $parsedContent;
    }

    private function generateFilePath(array $data)
    {
        $filePath = $this->_options['main_dir'] . $this->_options['posts_dir'];
        $fileYear = date("Y", strtotime(!empty($data['date']) ? $data['date'] : Carbon::now()));
        $fileName = $data['fileName'];
        $fileExtension = PostFile::POST_EXTENSION;

        return $filePath . DIRECTORY_SEPARATOR . $fileYear . DIRECTORY_SEPARATOR . $fileName . $fileExtension;
    }

    private function renderContent(array $data)
    {
        return $this->_parser->renderContent($data);
    }

}