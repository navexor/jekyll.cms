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
    private $_metaFields = [
        'layout',
        'title',
        'date',
        'categories',
        'tags',
        'author'
    ];

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
                    $value = trim($metaParts[2][0]);

                    if ($value && $value[0] == '"' && $value[strlen($value) - 1] == '"') {
                        $value = substr($value, 1, strlen($value) - 2);
                    }
                    $metaData[$metaParts[1][0]] = $value;
                }
            }
        }

        return $metaData;
    }

    public function renderContent(array $parts)
    {
        $originalParts = $parts;
        $filteredParts = [];

        foreach ($parts as $k => $v) {
            if (in_array($k, $this->_metaFields)) {
                $filteredParts[$k] = $v;
            }
        }
        $parts = $filteredParts;

        $headerLines[] = "---";
        foreach ($parts as $key => $part) {
            $headerLines[] = "{$key}: {$part}";
        }
        $headerLines[] = "---";

        $header = implode("\n", $headerLines);
        $content = $header . "\n" . $originalParts['content'];

        return $content;
    }

    public function changeBrightness( $hex, $adjust )
    {
        $red   = hexdec( $hex[0] . $hex[1] );
        $green = hexdec( $hex[2] . $hex[3] );
        $blue  = hexdec( $hex[4] . $hex[5] );

        $cb = $red + $green + $blue;

        if ( $cb > $adjust ) {
            $db = ( $cb - $adjust ) % 255;

            $red -= $db; $green -= $db; $blue -= $db;
            if ( $red < 0 ) $red = 0;
            if ( $green < 0 ) $green = 0;
            if ( $blue < 0 ) $blue = 0;
        } else {
            $db = ( $adjust - $cb ) % 255;

            $red += $db; $green += $db; $blue += $db;
            if ( $red > 255 ) $red = 255;
            if ( $green > 255 ) $green = 255;
            if ( $blue > 255 ) $blue = 255;
        }

        return str_pad( dechex( $red ), 2, '0', 0 )
        . str_pad( dechex( $green ), 2, '0', 0 )
        . str_pad( dechex( $blue ), 2, '0', 0 );
    }
}