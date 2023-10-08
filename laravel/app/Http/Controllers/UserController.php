<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\SignupRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    //
    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();
        if (!Auth::attempt($credentials)) {
            return response([
                'message' => 'Invalid credentials'
            ]);
        }
        $user = Auth::user();
        /** @var User $user */
       $token = $user->createToken('main')->plainTextToken;
       Log::info('Generated Token: ' . $token);
       return response([
        'user' => $user,
        'token' => $token
    ]);
    }
    public function signup(SignupRequest $request)
    {
        $data = $request->validated();
        /** @var User $user */
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        $token = $user->createToken('main')->plainTextToken;

        return response([
            'user' => $user,
            'token' => $token
        ]);
    }
    public function logout(Request $request)
    {
        /** @var User $user */
        $user = $request->user();
        $user->currentAccessToken()->delete;
        return response('',204);
    }
}
