<?php

namespace App\Utils;

/**
 * Common Utils to return api json response
 */
trait ResponseUtils
{
    public function json_response($message, $data, $status, $statuscode = 200, $error = null)
    {
        return response()->json([
            'message' => $message,
            'data' => $data,
            'status' => $status,
            'error' => $error
        ], $statuscode);
    }
}