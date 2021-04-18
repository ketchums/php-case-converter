<?php

namespace App;

abstract class CaseType
{
    const CAMEL = 0;
    const PASCAL = 1;
    const KEBAB = 2;
    const SNAKE = 3;
    const DOT = 4;
    const UNKNOWN = 5;
}