<?php

namespace App\Rules;

use App\Models\User;
use App\Services\UserService;
use Closure;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Validation\ValidationRule;

class IsPasswordMatchedRule implements ValidationRule
{
    private User $user;
    public function __construct(User| Authenticatable $user)
    {
        $this->user = $user;
    }
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!(new UserService)->checkPassword($this->user, $value)) {
            $fail(__('validation.current_password'));
        }
    }
}
