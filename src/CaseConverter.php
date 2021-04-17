<?php

namespace App;

use App\Encoders\CamelCaseEncoder;
use App\Encoders\Encoder;
use App\Encoders\PascalCaseEncoder;
use App\Encoders\KebabCaseEncoder;
use App\Encoders\SnakeCaseEncoder;
use App\Encoders\DotCaseEncoder;

class CaseConverter
{
    use CaseDetection;

    private string $string;
    private int $type = 3949;

    private array $encoders;

    public function __construct(string $string) {
        $this->string = $string;
        $this->type = $this->detectCaseType($string);

        $this->assignEncoders();
    }

    private function assignEncoders() {
        $this->registerEncoder('camel', new CamelCaseEncoder());
        $this->registerEncoder('pascal', new PascalCaseEncoder());
        $this->registerEncoder('kebab', new KebabCaseEncoder());
        $this->registerEncoder('snake', new SnakeCaseEncoder());
        $this->registerEncoder('dot', new DotCaseEncoder());
    }

    private function registerEncoder(string $name, Encoder $encoder) {
        $this->encoders[$name] = $encoder;
    }

    private function isAllowedMagicMethod($methodName) {
        return substr($methodName, 0, 2) === "to" &&
            substr($methodName, strlen($methodName) - 4, 4) === "Case" &&
            $this->isCamelCase($methodName);
    }

    private function getEncoderNameFromMethodName($methodName) {
        return str_replace(
            'case', '', strtolower(
                substr($methodName, 2)
            )
        );
    }

    public function __call($name, $arguments) {
        return $this->isAllowedMagicMethod($name) ? $this->encodeUsingEncoder(
            $this->string,
            $this->getEncoderNameFromMethodName($name)
        ) : null;
    }

    private function encodeUsingEncoder(string $string, string $encoder) : string {
        if (!array_key_exists($encoder, $this->encoders)) {
            throw new \Exception("Failed to resolve encoder for '" . $encoder . "'");
        }

        return $this->encoders[$encoder]->encode($string, $this->type);
    }
}