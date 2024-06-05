<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReceiveAnswersRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {

        return [
            'answers' => ['required', 'array'],
            'answers.*' => ['required', 'array'],
            'answers.*.question_id' => ['required', 'integer'],
            'answers.*.answer' => ['required', 'boolean'],
            'answers.*.option_id' => ['sometimes', 'integer', 'nullable'],
            'answers.*.timestamp' => ['required', 'date_format:Y-m-d H:i'],
        ];
    }
}
