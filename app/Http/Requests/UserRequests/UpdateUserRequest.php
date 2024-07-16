<?php

namespace App\Http\Requests\UserRequests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        $id = $this->route()->parameter('user');

        return [
            'name' => ['sometimes', 'string', 'min:1'],
            'username' => ['sometimes', 'string', 'min:5', "unique:users,username,{$id}"],
            'password' => ['sometimes', 'string', 'min:8'],
            "role_id" => ['sometimes', 'exists:roles,id'],
        ];
    }
}
