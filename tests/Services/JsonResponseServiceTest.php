<?php
use PHPUnit\Framework\TestCase;

class JsonResponseServiceTest extends TestCase {

    public function testSuccessJsonResponse()
    {
        $expected = ['message' => 'test', 'data' => ['id' => 1, 'name' => 'fake name']];
        $inputMessage = 'test';
        $inputData = ['id' => 1, 'name' => 'fake name'];
        $result = \ProjMange\Services\JsonResponseService::jsonResponse($inputMessage, $inputData);
        $this->assertEquals($expected, $result);
    }

    public function testFailureJsonResponse()
    {
        $expected = ['message' => 'test', 'data' => []];
        $inputMessage = 'test';
        $result = \ProjMange\Services\JsonResponseService::jsonResponse($inputMessage);
        $this->assertEquals($expected, $result);
    }

    public function testMalformedJsonResponse()
    {
        $this->expectException(TypeError::class);
        $inputMessage = [];
        $inputData = [];
        $case = \ProjMange\Services\JsonResponseService::jsonResponse($inputData, $inputMessage);
    }
}

