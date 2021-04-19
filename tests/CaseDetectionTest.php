<?php declare(strict_types = 1);

use App\CaseDetection;
use PHPUnit\Framework\TestCase;

final class CaseDetectionTest extends TestCase
{
    public function testCaseDetections() : void
    {
        $caseDetector = new CaseDetection();

        $this->assertTrue($caseDetector->detectType('camelCaseTestString') == 0);
        $this->assertTrue($caseDetector->detectType('PascalCaseTestString') == 1);
        $this->assertTrue($caseDetector->detectType('kebab-case-test-string') == 2);
        $this->assertTrue($caseDetector->detectType('snake_case_test_string') == 3);
        $this->assertTrue($caseDetector->detectType('dot.case.test.string') == 4);
        $this->assertTrue($caseDetector->detectType('unknown test string') == 5);
    }
}