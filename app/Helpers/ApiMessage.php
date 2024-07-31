<?php

namespace App\Helpers;

use App\Enums\ApiResponseMessage;
use Illuminate\Http\JsonResponse;

class ApiMessage
{
    /**
     * @param array $data
     * @param ApiResponseMessage $message
     * @param int $statusCode
     * @return JsonResponse
     */
    public static function success(array $data = [], ApiResponseMessage $message = ApiResponseMessage::SUCCESS, int $statusCode = 200): JsonResponse
    {
        return response()->json([
            'status' => 'success',
            'message' => $message->value,
            'data' => $data
        ], $statusCode);
    }

    /**
     * @param ApiResponseMessage $message
     * @param array $errors
     * @param int $statusCode
     * @return JsonResponse
     */
    public static function error(ApiResponseMessage $message = ApiResponseMessage::ERROR, array $errors = [], int $statusCode = 400): JsonResponse
    {
        return response()->json([
            'status' => 'error',
            'message' => $message->value,
            'errors' => $errors
        ], $statusCode);
    }
}