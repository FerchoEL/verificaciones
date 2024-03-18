<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFieldRequest extends FormRequest
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
                'category' => ['required'],
                'subcategory' => ['required'],
                'field' => ['required'],
                'type' => ['required'],
                'NOM' => ['required'],
                'critically' => ['required'],
                'system_type' => ['required'],
            ];
        }else{
            return [
                'category' => ['sometimes','required'],
                'subcategory' => ['sometimes','required'],
                'field' => ['sometimes','required'],
                'type' => ['sometimes','required'],
                'NOM' => ['sometimes','required'],
                'information' => ['sometimes'],
                'critically' => ['sometimes','required'],
                'system_type' => ['sometimes','required'],
            ];
        }
    }
}
