<?php

namespace App\Encoders;

abstract class AbstractEncoder implements Encoder {
    public function encode(string $string, int $currentType): string
    {
        switch ($currentType) {
            case 0:
                return $this->encodeFromCamel($string);
            case 1:
                return $this->encodeFromPascal($string);
            case 2:
                return $this->encodeFromKebab($string);
            case 3:
                return $this->encodeFromSnake($string);
            case 4:
                return $this->encodeFromDot($string);
            default:
                return $this->encodeFromUnknown($string);
        }
    }

    abstract function encodeFromCamel(string $string) : string;
    abstract function encodeFromPascal(string $string) : string;
    abstract function encodeFromKebab(string $string) : string;
    abstract function encodeFromSnake(string $string) : string;
    abstract function encodeFromDot(string $string) : string;
    abstract function encodeFromUnknown(string $string) : string;
}