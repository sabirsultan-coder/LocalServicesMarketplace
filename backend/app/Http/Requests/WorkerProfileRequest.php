<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorkerProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules.
     */
    public function rules(): array
    {
        return [
            'worker_type_id' => 'required|exists:worker_types,id',
            'experience'     => 'required|integer|min:0|max:60',
            'description'    => 'nullable|string|max:500',
            'hourly_rate'    => 'nullable|numeric|min:0',
            'latitude'       => 'required|numeric',
            'longitude'      => 'required|numeric',
        ];
    }
}
