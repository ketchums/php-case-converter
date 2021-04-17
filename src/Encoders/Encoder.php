<?php

namespace App\Encoders;

interface Encoder {
    public function encode(string $string, int $currentType) : string;
}