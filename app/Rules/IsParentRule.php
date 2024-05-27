<?php

namespace App\Rules;

use App\Services\LevelService;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class IsParentRule implements ValidationRule
{

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!(new LevelService)->isParent($value)) {
            $fail(__('custom.is_parent'));
        }
    }
}
