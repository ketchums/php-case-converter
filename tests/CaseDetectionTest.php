<?php declare(strict_types = 1);

use App\CaseDetection;
use PHPUnit\Framework\TestCase;

final class CaseDetectionTest extends TestCase
{
    public function testCaseDetections() : void
    {
        $caseDetector = new CaseDetection();

        $this->assertTrue($caseDetector->detect('camelCaseTestString') == 0);
        $this->assertTrue($caseDetector->detect('PascalCaseTestString') == 1);
        $this->assertTrue($caseDetector->detect('kebab-case-test-string') == 2);
        $this->assertTrue($caseDetector->detect('snake_case_test_string') == 3);
        $this->assertTrue($caseDetector->detect('dot.case.test.string') == 4);
        $this->assertTrue($caseDetector->detect('unknown test string') == 5);
    }
}