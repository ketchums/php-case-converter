<?php

namespace App;

abstract class CaseType
{
    const Camel = 0;
    const Pascal = 1;
    const Kebab = 2;
    const Snake = 3;
    const Dot = 4;
    const Unknown = 5;
}