<?php

namespace App\Services;

use App\Models\Worker;
use Illuminate\Support\Facades\DB;

class WorkerListingService
{
    public function getWorkers(array $filters = [])
    {
        $query = Worker::with([
            'user',
            'workerType.category'
        ])->where('is_available', true);

        // Filter by Category
        if (!empty($filters['category_id'])) {
            $query->whereHas('workerType', function ($q) use ($filters) {
                $q->where('category_id', $filters['category_id']);
            });
        }

        // Filter by Worker Type
        if (!empty($filters['worker_type_id'])) {
            $query->where('worker_type_id', $filters['worker_type_id']);
        }

        // Search
        if (!empty($filters['search'])) {

            $search = $filters['search'];

            $query->where(function ($q) use ($search) {

                $q->where('description', 'like', "%{$search}%")

                    ->orWhereHas('user', function ($user) use ($search) {
                        $user->where('name', 'like', "%{$search}%");
                    })

                    ->orWhereHas('workerType', function ($type) use ($search) {
                        $type->where('name', 'like', "%{$search}%");
                    });

            });
        }
        if (
            !empty($filters['latitude']) &&
            !empty($filters['longitude'])
        ) {

            $latitude = $filters['latitude'];
            $longitude = $filters['longitude'];

            $query->select('*')
                ->selectRaw("
                    (
                        6371 * acos(
                            cos(radians(?))
                            * cos(radians(latitude))
                            * cos(radians(longitude) - radians(?))
                            + sin(radians(?))
                            * sin(radians(latitude))
                        )
                    ) AS distance
                ", [
                    $latitude,
                    $longitude,
                    $latitude
                ])
                ->orderBy('distance');
        }
        return $query->get();
    }
}
