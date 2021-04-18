<?php

namespace App\Encoders;

use App\CaseType;

abstract class AbstractEncoder implements Encoder {
    public function encode(string $string, int $currentType): string
    {
        switch ($currentType) {
            case CaseType::CAMEL:
                return $this->encodeFromCamel($string);
            case CaseType::PASCAL:
                return $this->encodeFromPascal($string);
            case CaseType::KEBAB:
                return $this->encodeFromKebab($string);
            case CaseType::SNAKE:
                return $this->encodeFromSnake($string);
            case CaseType::DOT:
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