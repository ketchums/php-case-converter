<?php declare(strict_types = 1);

use App\CaseConverter;
use App\CaseDetection;
use App\CaseType;
use PHPUnit\Framework\TestCase;

final class ToPascalCaseTest extends TestCase
{
    public function testPascalCaseConvert() : void
    {
        $caseConverter = new CaseConverter('camelCaseTestString', CaseType::CAMEL);
        $this->assertTrue($caseConverter->toPascalCase() === 'CamelCaseTestString');

        $caseConverter = new CaseConverter('kebab-case-test-string', CaseType::KEBAB);
        $this->assertTrue($caseConverter->toPascalCase() === 'KebabCaseTestString');

        $caseConverter = new CaseConverter('snake_case_test_string', CaseType::SNAKE);
        $this->assertTrue($caseConverter->toPascalCase() === 'SnakeCaseTestString');

        $caseConverter = new CaseConverter('dot.case.test.string', CaseType::DOT);
        $this->assertTrue($caseConverter->toPascalCase() === 'DotCaseTestString');
    }
}