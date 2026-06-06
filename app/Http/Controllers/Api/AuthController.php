<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * @group Autentikasi
     *
     * Mendaftarkan user baru.
     *
     * @bodyParam name string required Full name. Example: Budi Santoso
     * @bodyParam email string required User email. Example: budi@example.com
     * @bodyParam password string required User password, minimum 8 characters. Example: password123
     * @bodyParam password_confirmation string required Password confirmation. Example: password123
     */
    public function register(RegisterRequest $request): JsonResponse
    {
        $user = User::create($request->validated());
        $token = $user->createToken('auth-token')->plainTextToken;

        return response()->json([
            'message' => 'Register successful.',
            'token' => $token,
            'user' => $user,
        ], 201);
    }

    /**
     * @group Autentikasi
     *
     * Login dan mendapatkan access token.
     *
     * @bodyParam email string required User email. Example: admin@example.com
     * @bodyParam password string required User password. Example: password
     */
    public function login(LoginRequest $request): JsonResponse
    {
        $email = $request->string('email')->toString();
        $password = $request->string('password')->toString();

        $user = User::query()->where('email', $email)->first();

        if (! $user || ! Hash::check($password, $user->password)) {
            return response()->json([
                'message' => 'Invalid credentials.',
            ], 422);
        }

        $token = $user->createToken('auth-token')->plainTextToken;

        return response()->json([
            'message' => 'Login successful.',
            'token' => $token,
            'user' => $user,
        ]);
    }

    /**
     * @group Autentikasi
     *
     * Logout dari user yang sedang aktif.
     *
     * @authenticated
     */
    public function logout(): JsonResponse
    {
        auth()->user()?->currentAccessToken()?->delete();

        return response()->json([
            'message' => 'Logout successful.',
        ]);
    }
}
