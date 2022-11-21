<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\User as UserResource;
use App\Http\Requests\RegisterUserRequest;
use App\Http\Requests\Transformers\UserRequestTransformer;
use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;


class RegisterController extends Controller
{
    public function register(RegisterUserRequest $request)
    {
        $data = UserRequestTransformer::makeRegisterData($request);

        $newUser = new User($data);
        $newUser->save();

        $token = JWTAuth::fromUser($newUser);

        return response()->json(['user' => new UserResource($newUser), 'token' => $token]);
    }
}
