<?php

namespace App\Http\Requests\LevelRequests;



use Illuminate\Foundation\Http\FormRequest;

class StoreLevelVersionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }



    public function rules(): array
    {

        return [
            'value' => ['required', 'numeric', 'between:1.00,100'],
        ];
    }
}
