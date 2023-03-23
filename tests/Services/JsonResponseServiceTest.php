<?php
use PHPUnit\Framework\TestCase;
use ProjMange\Services\JsonResponseService;

class JsonResponseServiceTest extends TestCase {

    public function testSuccessFormatJsonResponse()
    {
        $expected = ['message' => 'test', 'data' => ['id' => 1, 'name' => 'fake name']];
        $inputMessage = 'test';
        $inputData = ['id' => 1, 'name' => 'fake name'];
        $result = JsonResponseService::formatJsonResponse($inputMessage, $inputData);
        $this->assertEquals($expected, $result);
    }

    public function testFailureFormatJsonResponse()
    {
        $expected = ['message' => 'test', 'data' => []];
        $inputMessage = 'test';
        $result = JsonResponseService::formatJsonResponse($inputMessage);
        $this->assertEquals($expected, $result);
    }

    public function testMalformedFormatJsonResponse()
    {
        $this->expectException(TypeError::class);
        $inputMessage = [];
        $inputData = [];
        $case = JsonResponseService::formatJsonResponse($inputData, $inputMessage);
    }

    public function testSuccessFormatJsonResponseProject()
    {
        $projectMock = $this->createMock(\ProjMange\Entities\ProjectEntity::class);
        $example = JsonResponseService::formatJsonResponseProject('test', $projectMock);
        $expected = ['message' => 'test', 'data' => $projectMock];
        $this->assertEquals($expected, $example);
    }

    public function testFailureFormatJsonResponseProject()
    {
        $projectMock = $this->createMock(\ProjMange\Entities\ProjectEntity::class);
        $example = JsonResponseService::formatJsonResponseProject('', $projectMock);
        $expected = ['message' => '', 'data' => $projectMock];
        $this->assertEquals($expected, $example);
    }

    public function testMalformedFormatJsonResponseProject()
    {
        $projectMock = $this->createMock(\ProjMange\Entities\ProjectEntity::class);
        $this->expectException(TypeError::class);
        $example = JsonResponseService::formatJsonResponseProject([], $projectMock);
        $expected = ['message' => [], 'data' => $projectMock];
        $case = JsonResponseService::formatJsonResponseProject($example, $expected);
    }
}

