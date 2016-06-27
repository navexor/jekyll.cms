<?php

namespace App\Repositories\Post;
/**
 * Created by PhpStorm.
 * User: oleg
 * Date: 23.06.2016
 * Time: 22:57
 */
class PostParser
{
    public function parseFile($fileContent = '')
    {
        $metaData = [];
        $isCorrectPost = preg_match_all('/^---\n(.*)\n---/s', $fileContent, $matches);
        $metaData['content'] = preg_replace('/---(.*)---\n/s', '', $fileContent);

        if ($isCorrectPost && !empty($matches[1])) {
            $metaContent = $matches[1][0];

            $metaLines = preg_split('/\n/', $metaContent);
            foreach ($metaLines as $metaLine) {
                $isCorrectValues = preg_match_all('/^([^:]+):(.*)$/s', $metaLine, $metaParts);
                if ($isCorrectValues && count($metaParts) > 2) {
                    $metaData[$metaParts[1][0]] = trim($metaParts[2][0]);
                }
            }
        }

        return $metaData;
    }
}