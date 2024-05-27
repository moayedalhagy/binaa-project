<?php

namespace App\Rules;

use App\Services\LevelService;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class parentIsPublishedRule implements ValidationRule
{

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!(new LevelService)->isPublished($value)) {
            $fail(__('custom.parent_level_not_published'));
        }
    }
}
