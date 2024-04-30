<?php

namespace App\Traits;

trait RepositoryResponseTrait
{
    private function successResponse($message,$data=null, $code = 200)
    {
        return [
            'status' => true,
            'message' => $message,
            'data' => $data,
            'code' => $code
        ];
    }

    private function errorResponse($message,$data=null,$code = 500)
    {
        return [
            'status' => false,
            'message' => $message,
            'data' => $data,
            'code' => $code
        ];
    }
}
