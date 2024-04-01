<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUnitRequest extends FormRequest
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
            'date' => ['required'],
            'user_id' => ['required'],
            'idsap' => ['required'],
            'vehicle_id' => ['required'],
            'component_id' => ['required'],
            'chassis_serial' => ['required'],
            'chassis_serial_origin' => ['required'],
            'license_plate' => ['required'],
            'license_plate_origin' => ['required'],
            'license_plate_type' => ['required'],
            'location_id' => ['required'],
            'entity_id' => ['required'],
            'car_brand' => ['required'],
            'car_model' => ['required'],
            'modification' => ['required'],
        ];
    }
}
