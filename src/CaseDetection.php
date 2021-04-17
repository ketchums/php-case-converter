<?php

namespace App;

trait CaseDetection
{
    public function detectCaseType(string $string) : int {
        if ($this->isKebabCase($string)) {
            return CaseType::Kebab;
        } else if ($this->isSnakeCase($string)) {
            return CaseType::Snake;
        } else if ($this->isDotCase($string)) {
            return CaseType::Dot;
        } else if ($this->isCamelCase($string)) {
            return CaseType::Camel;
        } else if ($this->isPascalCase($string)) {
            return CaseType::Pascal;
        }

        return CaseType::Unknown;
    }

    private function isCamelCase(string $string) : bool {
        return !ctype_upper($string[0]) &&
            !hasRepeatedUppercaseLetters($string) &&
            containsUppercaseCharacters($string) &&
            !ctype_upper(substr($string, strlen($string) - 1));
    }

    private function isPascalCase(string $string) : bool {
        return ctype_upper($string[0]) &&
            !hasRepeatedUppercaseLetters($string) &&
            containsLowercaseCharacters($string) &&
            !ctype_upper(substr($string, strlen($string) - 1));
    }

    private function isKebabCase(string $string) : bool {
        return strpos($string, '-') !== false &&
            containsCharacterOtherThan($string, '-') &&
            substr($string, 0, strlen($string)) != '-' &&
            substr($string, - strlen($string)) != '-';
    }

    private function isSnakeCase(string $string) : bool {
        return strpos($string, '_') !== false &&
            containsCharacterOtherThan($string, '_') &&
            substr($string, 0, strlen($string)) != '_' &&
            substr($string, - strlen($string)) != '_';
    }

    private function isDotCase(string $string) : bool {
        return strpos($string, '.') !== false &&
            containsCharacterOtherThan($string, '.') &&
            substr($string, 0, strlen($string)) != '.' &&
            substr($string, - strlen($string)) != '.';
    }
}