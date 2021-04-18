<?php

namespace App\Encoders;

class SnakeCaseEncoder extends AbstractEncoder
{
    public function encodeFromCamel(string $string) : string
    {
        $rebuiltString = '';

        foreach (str_split($string) as $piece) {
            $rebuiltString .= ctype_upper($piece) ? '_' . $piece : $piece;
        }

        return strtolower($rebuiltString);
    }

    public function encodeFromPascal(string $string) : string
    {
        $rebuiltString = '';

        foreach (str_split($string) as $key => $piece) {
            $rebuiltString .= (ctype_upper($piece) && $key > 0) ? '_' . $piece : $piece;
        }

        return strtolower($rebuiltString);
    }

    public function encodeFromKebab(string $string) : string
    {
        return str_replace('-', '_', $string);
    }

    public function encodeFromSnake(string $string): string
    {
        return $string;
    }

    public function encodeFromDot(string $string) : string
    {
        return str_replace('.', '_', $string);
    }

    public function encodeFromUnknown(string $string): string {
        return $string;
    }
}