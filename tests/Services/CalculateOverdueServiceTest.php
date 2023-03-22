<?php
use PHPUnit\Framework\TestCase;

class CalculateOverdueServiceTest extends TestCase {

    public function testSuccessCalculateOverdueFalse()
    {
        $datetime = new \DateTime('tomorrow');
        $input = $datetime->format('Y-m-d');
        $result = \ProjMange\Services\CalculateOverdueService::calculateOverdue($input);
        $this->assertFalse($result);
    }

    public function testSuccessCalculateOverdueTrue()
    {
        $input = '2022-11-07';
        $result = \ProjMange\Services\CalculateOverdueService::calculateOverdue($input);
        $this->assertTrue($result);
    }

    public function testFailureCalculateOverdueNull()
    {
        $input = null;
        $result = \ProjMange\Services\CalculateOverdueService::calculateOverdue($input);
        $this->assertFalse($result);
    }

    public function testFailureCalculateOverdueString()
    {
        $input = '12345';
        $result = \ProjMange\Services\CalculateOverdueService::calculateOverdue($input);
        $this->assertFalse($result);
    }

    public function testMalformedCalculateOverdue()
    {
        $this->expectException(TypeError::class);
        $input = [];
        $case = \ProjMange\Services\CalculateOverdueService::calculateOverdue($input);
    }
}