<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWorkerProfileRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'worker_type_id' => 'sometimes|exists:worker_types,id',
            'experience'     => 'sometimes|integer|min:0|max:60',
            'description'    => 'nullable|string|max:500',
            'hourly_rate'    => 'nullable|numeric|min:0',
            'latitude'       => 'nullable|numeric',
            'longitude'      => 'nullable|numeric',
            'is_available'   => 'sometimes|boolean',
        ];
    }
}
