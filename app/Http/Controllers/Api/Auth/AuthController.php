<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Requests\LoginUserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @param LoginUserRequest $request
     * @return JsonResponse
     */
    public function login(LoginUserRequest $request): JsonResponse
    {
        $credentials = $request->only('email', 'password');
        $token = auth()->claims(['exp_time' => (int)env('JWT_TTL') / (60 * 24)])->attempt($credentials);

        if($request->notRemember) {
            $ttl = env('JWT_NOT_REMEMBER_TTL') === NULL ?
                env('JWT_NOT_REMEMBER_TTL') :
                (int)env('JWT_NOT_REMEMBER_TTL') / (60 * 24);
            $token = auth()
                ->setTTL(env('JWT_NOT_REMEMBER_TTL'))
                ->claims(['exp_time' => $ttl])
                ->attempt($credentials);
        }
        if (!$token) {
            return response()->json(['error' => 'Вы ввели неверные данные'], 403);
        }

        return $this->respondWithToken($token);
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return JsonResponse
     */
    public function logout(): JsonResponse
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Get the token array structure.
     *
     * @param string $token
     *
     * @return JsonResponse
     */
    protected function respondWithToken(string $token): JsonResponse
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
