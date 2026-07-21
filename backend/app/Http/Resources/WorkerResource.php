<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WorkerResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'             => $this->id,
            'user_id'        => $this->user_id,
            'worker_type_id' => $this->worker_type_id,
            'experience'     => $this->experience,
            'description'    => $this->description,
            'hourly_rate'    => $this->hourly_rate,
            'latitude'       => $this->latitude,
            'longitude'      => $this->longitude,
            'is_available'   => $this->is_available,
            'is_verified'    => $this->is_verified,
        ];
    }
}
