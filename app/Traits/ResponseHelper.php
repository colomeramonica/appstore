<?php 

namespace App\Traits;

trait ResponseHelper
{
    public function successResponse($data)
    {
        return response()->json([
            'status' => 'success',
            'data' => $data
        ], 201);
    }

    public function errorResponse($message, $statusCode)
    {
        return response()->json([
            'status' => 'error',
            'message' => $message,
        ], $statusCode);
    }
}
