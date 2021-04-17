<?php

function hasRepeatedUppercaseLetters(string $string) : bool {
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

function containsUppercaseCharacters(string $string) : bool
{
    foreach (str_split($string) as $character) {
        if (ctype_upper($character)) {
            return true;
        }
    }

    return false;
}

function containsLowercaseCharacters(string $string) : bool
{
    foreach (str_split($string) as $character) {
        if (ctype_lower($character)) {
            return true;
        }
    }

    return false;
}

function containsCharacterOtherThan(string $string, string $needle) : bool
{
    foreach (str_split($string) as $character) {
        if ($character != $needle) {
            return true;
        }
    }
    
    return false;
}