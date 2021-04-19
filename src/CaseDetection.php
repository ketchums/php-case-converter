<?php

namespace App;

class CaseDetection
{
    public function detectType(string $string) : int
    {
        if ($this->isKebabCase($string)) {
            return CaseType::KEBAB;
        } else if ($this->isSnakeCase($string)) {
            return CaseType::SNAKE;
        } else if ($this->isDotCase($string)) {
            return CaseType::DOT;
        } else if ($this->isCamelCase($string)) {
            return CaseType::CAMEL;
        } else if ($this->isPascalCase($string)) {
            return CaseType::PASCAL;
        }

        return CaseType::UNKNOWN;
    }

    private function isCamelCase(string $string) : bool
    {
        return !ctype_upper($string[0]) &&
            !$this->hasRepeatedUppercaseLetters($string) &&
            $this->containsUppercaseCharacters($string) &&
            !ctype_upper(substr($string, strlen($string) - 1));
    }

    private function isPascalCase(string $string) : bool
    {
        return ctype_upper($string[0]) &&
            !$this->hasRepeatedUppercaseLetters($string) &&
            $this->containsLowercaseCharacters($string) &&
            !ctype_upper(substr($string, strlen($string) - 1));
    }

    private function isKebabCase(string $string) : bool
    {
        return strpos($string, '-') !== false &&
            $this->containsCharacterOtherThan($string, '-') &&
            substr($string, 0, strlen($string)) != '-' &&
            substr($string, - strlen($string)) != '-';
    }

    private function isSnakeCase(string $string) : bool
    {
        return strpos($string, '_') !== false &&
            $this->containsCharacterOtherThan($string, '_') &&
            substr($string, 0, strlen($string)) != '_' &&
            substr($string, - strlen($string)) != '_';
    }

    private function isDotCase(string $string) : bool
    {
        return strpos($string, '.') !== false &&
            $this->containsCharacterOtherThan($string, '.') &&
            substr($string, 0, strlen($string)) != '.' &&
            substr($string, - strlen($string)) != '.';
    }

    private function containsCharacterOtherThan(string $string, string $needle) : bool
    {
        foreach (str_split($string) as $character) {
            if ($character != $needle) {
                return true;
            }
        }

        return false;
    }

    public function containsLowercaseCharacters(string $string) : bool
    {
        foreach (str_split($string) as $character) {
            if (ctype_lower($character)) {
                return true;
            }
        }

        return false;
    }

    public function containsUppercaseCharacters(string $string) : bool
    {
        foreach (str_split($string) as $character) {
            if (ctype_upper($character)) {
                return true;
            }
        }

        return false;
    }

    public function hasRepeatedUppercaseLetters(string $string) : bool {
        $foundUppercaseLast = false;

        foreach (str_split($string) as $character) {
            if (ctype_upper($character)) {
                if ($foundUppercaseLast) {
                    return true;
                }

                $foundUppercaseLast = true;
            } else {
                $foundUppercaseLast = false;
            }
        }

        return false;
    }
}

