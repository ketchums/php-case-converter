<?php declare(strict_types = 1);

use App\CaseConverter;
use App\CaseDetection;
use App\CaseType;
use PHPUnit\Framework\TestCase;

final class ToCamelCaseTest extends TestCase
{
    public function testCamelCaseConvert() : void
    {
        $caseConverter = new CaseConverter('PascalCaseTestString', CaseType::PASCAL);
        $this->assertTrue($caseConverter->toCamelCase() === 'pascalCaseTestString');

        $caseConverter = new CaseConverter('kebab-case-test-string', CaseType::KEBAB);
        $this->assertTrue($caseConverter->toCamelCase() === 'kebabCaseTestString');

        $caseConverter = new CaseConverter('snake_case_test_string', CaseType::SNAKE);
        $this->assertTrue($caseConverter->toCamelCase() === 'snakeCaseTestString');

        $caseConverter = new CaseConverter('dot.case.test.string', CaseType::DOT);
        $this->assertTrue($caseConverter->toCamelCase() === 'dotCaseTestString');
    }
}