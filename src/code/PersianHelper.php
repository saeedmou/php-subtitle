<?php namespace Saeedmou\Subtitles;

class PersianHelper
{

    /*
    |--------------------------------------------------------------------------
    | Conversion Rules
    |--------------------------------------------------------------------------
    |
    | Default rules used when converting a string to Persian string.
    | Source: https://github.com/pishran/laravel-persian-string
     */
    public static function getPersianMapArray()
    {
        return array(
            "ArrabicToPersianChar"=> static::getArrabicToPersianCharMap(),
            "ArrabicToPersianNumberMap"=> static::getArrabicToPersianNumberMap(),
            "EnglishToPersianNumberMap"=> static::getEnglishToPersianNumberMap(),
            "PersianSymbolsMap"=> static::getPersianSymbolsMap(),
        );
    }

    public static function getArrabicToPersianCharMap()
    {
        return [
            'أ' => 'ا',
            'إ' => 'ا',
            'ك' => 'ک',
            'ؤ' => 'و',
            'ة' => 'ه',
            'ۀ' => 'ه',
            'ي' => 'ی',
            "\u{0640}"=>''
        ];
    }

    public static function getArrabicToPersianNumberMap()
    {
        return [
            '١' => '۱',
            '٢' => '۲',
            '٣' => '۳',
            '٤' => '۴',
            '٥' => '۵',
            '٦' => '۶',
            '٧' => '۷',
            '٨' => '۸',
            '٩' => '۹',
        ];
    }

    public static function getEnglishToPersianNumberMap()
    {
        return [
            '0' => '۰',
            '1' => '۱',
            '2' => '۲',
            '3' => '۳',
            '4' => '۴',
            '5' => '۵',
            '6' => '۶',
            '7' => '۷',
            '8' => '۸',
            '9' => '۹',
        ];
    }

    public static function getPersianSymbolsMap()
    {
        return [
            ';' => '؛',
            '?' => '؟',
            ',' => '،',
        ];
    }


}
