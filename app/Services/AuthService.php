<?php


namespace App\Services;


use App\Models\User;
use Illuminate\Support\Facades\Hash;

/**
 * خدمة المصادقة على عملية تسجيل الدخول
 */
class AuthService
{


    public static function login(array $request): array
    {
        $username = $request['username'];
        $password = $request['password'];


        $user = User::where('username', 'LIKE', $username)->first();

        if ($user && Hash::check($password, $user->password)) {

            $token =  $user->createToken($user->name);

            return [
                'id' => $user->id,
                'name' => $user->name,
                'api_token' => $token->plainTextToken,
                'role' => $user->role->name
            ];
        }
    }

    // delete the current token only
    public static function logout(User $user): bool
    {
        return $user->currentAccessToken()->delete();
    }

    //delete all user tokens
    public static function logoutAll(User $user): bool
    {
        return $user->tokens()->delete();
    }
}
