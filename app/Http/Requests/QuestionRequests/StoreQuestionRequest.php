<?php

namespace App\Http\Requests\QuestionRequests;

use App\Enums\QuestionType;
use App\Enums\Days;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreQuestionRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {

        $type_cases = array_column(QuestionType::cases(), 'value');

        $day_cases =   array_column(Days::cases(), 'value');

        return [
            "level_id" => ["required", "exists:levels,id"],
            "label" => ["required", "string"],
            "points" => ["required", "numeric"],
            "type" => ["required", Rule::in($type_cases)],
            "day" => ["required", Rule::in($day_cases)],
            "sort_order" => ["required", Rule::unique('questions')->where(function ($q) {
                return
                    $q->where('sort_order', $this->sort_order)
                    ->where('day', $this->day)
                    ->where('version_id', $this->level_id);
            })]
        ];
    }
}
