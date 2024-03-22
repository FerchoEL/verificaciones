<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreHaulierRequest extends FormRequest
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
        return [
            'name' => ['required'],
            'idsap' => ['required'],
            'rfc' => ['required'],
            'phone' => ['required'],
            'email' => ['required'],
            'entity_id' => ['required'],
            'city' => ['required'],
            'street' => ['required'],
            'address' => ['required'],
            'cp' => ['required'],
        ];
    }
}
