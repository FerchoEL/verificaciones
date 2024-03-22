<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSupportingFeatureRequest extends FormRequest
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
                'vehicle_id' => ['required'],
                'electric_motor' => ['required'],
                'horsepower' => ['required'],
                'torque' => ['required'],
                'traction' => ['required'],
                'capacity' => ['required'],
                'brake' => ['required'],
                'auxiliary' => ['required'],
                'camera' => ['required'],
                'regulator' => ['required'],
                'tape' => ['required'],
            ];
        }else{
            return [
                'vehicle_id' => ['sometimes','required'],
                'electric_motor' => ['sometimes','required'],
                'horsepower' => ['sometimes','required'],
                'torque' => ['sometimes','required'],
                'traction' => ['sometimes','required'],
                'capacity' => ['sometimes','required'],
                'brake' => ['sometimes','required'],
                'auxiliary' => ['sometimes','required'],
                'camera' => ['sometimes','required'],
                'regulator' => ['sometimes','required'],
                'tape' => ['sometimes','required'],
            ];
        }
    }
}
