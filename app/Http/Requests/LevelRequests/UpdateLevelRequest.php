<?php

namespace App\Http\Requests\LevelRequests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateLevelRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        $id = $this->route()->parameter('level');

        return [
            'label' => ['sometimes', "unique:levels,label,{$id},id"],
            // 'value' => ['sometimes', 'numeric', 'between:1.00,100'],
            'sort_order' => ['sometimes', 'integer', 'gt:0', "unique:levels,sort_order,{$id},id"],
        ];
    }
}
