<?php
namespace App\Helpers;

class StringHelper
{
    public function generateFilename($title = '')
    {
        return $this->getAlias($title);
    }

    /**
     * Print transliterate string.
     *
     * @param $str
     * @return string
     */
    private function transliterate($str)
    {
        $pairs = [
            'А' => 'A', 'Б' => 'B', 'В' => 'V', 'Г' => 'G', 'Д' => 'D', 'Е' => 'E', 'Ж' => 'J', 'З' => 'Z', 'И' => 'I',
            'Й' => 'Y', 'К' => 'K', 'Л' => 'L', 'М' => 'M', 'Н' => 'N', 'О' => 'O', 'П' => 'P', 'Р' => 'R', 'С' => 'S',
            'Т' => 'T', 'У' => 'U', 'Ф' => 'F', 'Х' => 'H', 'Ц' => 'TS', 'Ч' => 'CH', 'Ш' => 'SH', 'Щ' => 'SCH',
            'Ъ' => '', 'Ы' => 'YI', 'Ь' => '', 'Э' => 'E', 'Ю' => 'YU', 'Я' => 'YA', 'а' => 'a', 'б' => 'b', 'в' => 'v',
            'г' => 'g', 'д' => 'd', 'е' => 'e', 'ж' => 'j', 'з' => 'z', 'и' => 'i', 'й' => 'y', 'к' => 'k', 'л' => 'l',
            'м' => 'm', 'н' => 'n', 'о' => 'o', 'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f',
            'х' => 'h', 'ц' => 'ts', 'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sch', 'ъ' => 'y', 'ы' => 'yi', 'ь' => '',
            'э' => 'e', 'ю' => 'yu', 'я' => 'ya'
        ];

        return strtr($str, $pairs);
    }

    /**
     * Get alias for string.
     * In lower case, with dashes, only latin and numbers.
     *
     * @param $str
     * @return mixed|string
     */
    private function getAlias($str)
    {
        $str = $this->transliterate($str);
        $str = mb_strtolower($str);

        $str = preg_replace('/[()]/', '', $str);
        $str = preg_replace('/[^a-z0-9_]/', '-', $str);
        $str = preg_replace('/-(-)+/', '-', $str);
        $str = preg_replace('/(^-|-$)/', '', $str);

        return $str;
    }
}