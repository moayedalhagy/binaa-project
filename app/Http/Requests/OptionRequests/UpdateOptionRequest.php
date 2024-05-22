<?php

namespace App\Http\Requests\OptionRequests;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateOptionRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {

        $option_id = $this->route('option_id');
        $question_id = $this->route('id');


        return [
            'label' => [
                'sometimes',
                'string',
                Rule::unique('options', 'label')
                    ->ignore($option_id, 'id')
                    ->where('question_id', $question_id)
            ],
            'is_correct' => [
                'sometimes',
                'boolean'
            ]
        ];
    }
}
