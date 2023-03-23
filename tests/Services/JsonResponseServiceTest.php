<?php
use PHPUnit\Framework\TestCase;

class JsonResponseServiceTest extends TestCase {

    public function testSuccessFormatJsonResponse()
    {
        $expected = ['message' => 'test', 'data' => ['id' => 1, 'name' => 'fake name']];
        $inputMessage = 'test';
        $inputData = ['id' => 1, 'name' => 'fake name'];
        $result = \ProjMange\Services\JsonResponseService::formatJsonResponse($inputMessage, $inputData);
        $this->assertEquals($expected, $result);
    }

    public function testFailureFormatJsonResponse()
    {
        $expected = ['message' => 'test', 'data' => []];
        $inputMessage = 'test';
        $result = \ProjMange\Services\JsonResponseService::formatJsonResponse($inputMessage);
        $this->assertEquals($expected, $result);
    }

    public function testMalformedFormatJsonResponse()
    {
        $this->expectException(TypeError::class);
        $inputMessage = [];
        $inputData = [];
        $case = \ProjMange\Services\JsonResponseService::formatJsonResponse($inputData, $inputMessage);
    }
}

