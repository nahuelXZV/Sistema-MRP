<?php

namespace App\Http\Controllers\Api\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Models\User;

class TokenAuthController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'device_name' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        return ['user' => new UserResource($user), 'token' => $user->createToken($request->device_name)->plainTextToken];
    }

    public function destroy(Request $request)
    {
        $request->user()->tokens()->delete();
    }
}
