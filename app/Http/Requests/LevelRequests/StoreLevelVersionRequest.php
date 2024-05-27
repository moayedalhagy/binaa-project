<?php

namespace App\Http\Requests\LevelRequests;

use App\Rules\ParentIsPublishedRule;
use App\Rules\IsParentRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreLevelVersionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }


    protected function prepareForValidation(): void
    {
        $this->merge([
            'parent_id' => $this->route('id')
        ]);
    }

    public function rules(): array
    {

        return [
            'label' => ['required', 'unique:levels,label'],
            'value' => ['required', 'numeric', 'between:1.00,100'],
            'parent_id' => ['required', new IsParentRule, new ParentIsPublishedRule],
        ];
    }
}
