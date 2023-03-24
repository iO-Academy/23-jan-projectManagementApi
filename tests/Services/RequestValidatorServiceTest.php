<?php

use PHPUnit\Framework\TestCase;
use ProjMange\CustomExceptions\InvalidIdException;
use ProjMange\Services\RequestValidatorService;

class RequestValidatorServiceTest extends TestCase
{
    public function testSuccessValidateId()
    {
        $expected = '';
        $input = 1;
        $result = RequestValidatorService::validateId($input);
        $this->assertEquals($expected, $result);
    }

    public function testFailureValidateId()
    {
        $this->expectException(InvalidIdException::class);
        $input = 67485955;
        $result = RequestValidatorService::validateId($input);
    }

    public function testMalformedValidateId()
    {
        $this->expectException(TypeError::class);
        $input = 'silly';
        $result = RequestValidatorService::validateId($input);
    }
}
