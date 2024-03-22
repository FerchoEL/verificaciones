<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $method = $this->method();
        if ($method == 'PUT'){
            return [
                'user' => ['required'],
                'email' => ['required','email'],
                'password' => ['required'],
                'name' => ['required'],
            ];
        }else{
            return [
                'user' => ['sometimes','required'],
                'email' => ['sometimes','required','email'],
                'password' => ['sometimes','required'],
                'name' => ['sometimes','required'],
            ];
        }
    }
}
