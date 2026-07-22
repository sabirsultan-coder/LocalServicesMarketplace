<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WorkerListingResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,

            'name' => $this->user->name,

            'phone' => $this->user->phone,

            'category' => $this->workerType->category->name,

            'worker_type' => $this->workerType->name,

            'experience' => $this->experience,

            'description' => $this->description,

            'hourly_rate' => $this->hourly_rate,

            'latitude' => $this->latitude,

            'longitude' => $this->longitude,

            'is_available' => $this->is_available,

            'distance' => isset($this->distance)
                ? round($this->distance, 2)
                : null,
        ];
    }
}
