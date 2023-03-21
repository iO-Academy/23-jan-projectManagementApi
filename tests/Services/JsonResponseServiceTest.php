<?php
use PHPUnit\Framework\TestCase;

class JsonResponseServiceTest extends TestCase {

    public function testSuccessJsonResponse()
    {
        $expected = ['data' => ['id' => 1, 'name' => 'fake name'], 'message' => 'test'];
        $inputMessage = 'test';
        $inputData = ['id' => 1, 'name' => 'fake name'];
        $result = \ProjMange\Services\JsonResponseService::jsonResponse($inputMessage, $inputData);
        $this->assertSame($expected, $result);
    }

    public function testFailureJsonResponse()
    {
        $expected = ['data' => [], 'message' => 'test'];
        $inputMessage = 'test';
        $result = \ProjMange\Services\JsonResponseService::jsonResponse($inputMessage);
        $this->assertSame($expected, $result);
    }

    public function testMalformedJsonResponse()
    {
        $this->expectException(TypeError::class);
        $inputMessage = [];
        $inputData = [];
        $case = \ProjMange\Services\JsonResponseService::jsonResponse($inputData, $inputMessage);
    }
}

