<?php
class TranslitText
{

    private $text;
    private $converter = array(
        'а' => 'a',    'б' => 'b',    'в' => 'v',    'г' => 'g',    'д' => 'd',
        'е' => 'e',    'ё' => 'e',    'ж' => 'zh',   'з' => 'z',    'и' => 'i',
        'й' => 'y',    'к' => 'k',    'л' => 'l',    'м' => 'm',    'н' => 'n',
        'о' => 'o',    'п' => 'p',    'р' => 'r',    'с' => 's',    'т' => 't',
        'у' => 'u',    'ф' => 'f',    'х' => 'h',    'ц' => 'c',    'ч' => 'ch',
        'ш' => 'sh',   'щ' => 'sch',  'ь' => '',     'ы' => 'y',    'ъ' => '',
        'э' => 'e',    'ю' => 'yu',   'я' => 'ya',
    );

    // Транслитерация
    function translit($text)
    {
        $this->text = strtr(mb_strtolower($text), $this->converter); // Перевод текста в нижний регистр и транлитерация.
        $this->text = str_replace(' ', '_', $this->text); // Замена всех пробелов на "_".
        return $this->text;
    }
}

// $text = new TranslitText();
// echo $text->translit("С добрым утром!");
