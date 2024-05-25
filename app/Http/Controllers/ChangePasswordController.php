<?php

namespace App\Http\Controllers;

use App\Rules\IsPasswordMatchedRule;
use App\Services\ExceptionService;
use App\Services\UserService;
use Illuminate\Http\Request;

class ChangePasswordController extends Controller
{

    public function __invoke(Request $request)
    {
        $data = $request->validate([
            'current_password' => ['required', new IsPasswordMatchedRule(user: auth()->user())],
            'new_password' => ['required', 'different:current_password', 'string', 'min:8']
        ]);

        $state = (new UserService)
            ->changePassword(
                auth()->user(),
                $data['new_password']
            );

        if ($state) {
            auth()->user()->tokens()->delete();
            return $this->successJson();
        }

        ExceptionService::updateFailed();
    }
}
