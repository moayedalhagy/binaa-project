<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Services\AuthService;

class AuthController extends Controller
{

    public function Login(LoginRequest $request)
    {
        $data =  AuthService::login($request->validated());

        return response()->json($data);
    }
    public function logout()
    {
        AuthService::logout(auth()->user());

        return response()->noContent();
    }
    public function logoutAll()
    {
        AuthService::logoutAll(auth()->user());

        return response()->noContent();
    }
}
