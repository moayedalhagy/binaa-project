<?php

namespace App\Http\Requests\UserRequests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {


        return [
            'name' => ['required', 'string', 'min:1'],
            'username' => ['required', 'string', 'min:5', 'unique:users,username'],
            'password' => ['required', 'string', 'min:8'],
            "role_id" => ['required', 'exists:roles,id'],

        ];
    }
}
