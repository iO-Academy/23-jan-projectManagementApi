<?php
//JsonResponseService
//CreateJsonResponse
//Input = data, message

//To follow the structure of {
//"message": "Successfully retrieved project",
//"data": {

class JsonResponseService
{
    public function jsonResponse($data, $message string) //function that takes in the data and a message string
    {
        $res={}
        if (array_key_exists('$id',$data)) { //if id exists, then message will be successful
            $message = 'Successfully retrieved project';
            $res .= $message;
            } else {
    $message = 'Invalid client ID';
    $res .= $message;
    }
        return json_encode($res);
    }


}