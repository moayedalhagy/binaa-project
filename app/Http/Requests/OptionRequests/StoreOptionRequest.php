<?php

namespace App\Http\Requests\OptionRequests;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreOptionRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {

        return [
            'label' => ['required', 'string', Rule::unique('options', 'label')->where('question_id', $this->route('id'))],
            'is_correct' => [
                'required',
                'boolean'
            ]
        ];
    }
}
