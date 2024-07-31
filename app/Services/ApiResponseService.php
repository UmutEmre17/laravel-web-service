<?php

namespace App\Services;

use Illuminate\Http\JsonResponse;
use App\Enums\ApiResponseMessage;

class ApiResponseService
{
    public function success($data, ApiResponseMessage $message = ApiResponseMessage::SUCCESS, $status = 200): JsonResponse
    {
        return response()->json([
            'status' => 'success',
            'message' => $message->value,
            'data' => $data
        ], $status);
    }

    public function error(ApiResponseMessage $message = ApiResponseMessage::ERROR, $status = 400): JsonResponse
    {
        return response()->json([
            'status' => 'error',
            'message' => $message->value,
            'data' => null
        ], $status);
    }

    public function notFound(ApiResponseMessage $message = ApiResponseMessage::NOT_FOUND): JsonResponse
    {
        return $this->error($message, 404);
    }
}

