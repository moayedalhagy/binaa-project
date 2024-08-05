<?php

namespace App\Http\Requests\LevelRequests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLevelRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'label' => ['required', 'unique:levels,label'],
            'value' => ['required', 'numeric', 'between:1.00,100'],
            // 'sort_order' => ['required', 'integer', 'gt:0', 'unique:levels,sort_order'],
        ];
    }
}
