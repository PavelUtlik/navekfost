<?php

namespace App\Http\Requests\Transformers;

use App\Http\Requests\RegisterUserRequest;
use Avatar;
use Illuminate\Support\Facades\Storage;

class UserRequestTransformer
{
    /**
     * @param RegisterUserRequest $request
     * @return array
     */
    public static function makeRegisterData(RegisterUserRequest $request)
    {
        return [
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ];
    }
}