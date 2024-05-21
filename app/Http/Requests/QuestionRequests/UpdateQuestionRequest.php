<?php

namespace App\Http\Requests\QuestionRequests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Enums\QuestionType;
use App\Enums\Days;


class UpdateQuestionRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        $id = $this->route()->parameter('id');

        $type_cases = array_column(QuestionType::cases(), 'value');

        $day_cases =   array_column(Days::cases(), 'value');

        return [
            "level_id" => ["sometimes", "exists:levels,id"],
            "label" => ["sometimes", "string"],
            "points" => ["sometimes", "numeric"],
            "type" => ["sometimes", Rule::in($type_cases)],
            "day" => ["sometimes", Rule::in($day_cases)],
            "sort_order" => ["sometimes", "unique:questions,sort_order,{$id},id"]
        ];
    }
}
