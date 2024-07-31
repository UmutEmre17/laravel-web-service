<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use App\Enums\ApiResponseMessage;
use App\Helpers\ApiMessage;
use Exception;

class AuthService
{
    /**
     * @param string $email
     * @param string $password
     * @return JsonResponse
     */
    public function login(string $email, string $password): JsonResponse
    {
        $user = User::where('email', $email)->first();

        if (!$user || !Hash::check($password, $user->password)) {
            return ApiMessage::error(ApiResponseMessage::CREDENTIALS_INCORRECT, [], 401);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return ApiMessage::success(['token' => $token], ApiResponseMessage::SUCCESS);
    }

    /**
     * @param string $name
     * @param string $email
     * @param string $password
     * @return JsonResponse
     */
    public function register(string $name, string $email, string $password): JsonResponse
    {
        try {
            $user = User::create([
                'name' => $name,
                'email' => $email,
                'password' => Hash::make($password),
            ]);

            return ApiMessage::success(['user' => $user], ApiResponseMessage::SUCCESS, 201);
        } catch (Exception $e) {
            return ApiMessage::error(ApiResponseMessage::ERROR, ['exception' => $e->getMessage()], 500);
        }
    }
}