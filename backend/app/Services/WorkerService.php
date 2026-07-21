<?php

namespace App\Services;

use App\Models\Worker;

class WorkerService
{
    public function createWorkerProfile($userId, array $data)
    {
        return Worker::create([
            'user_id'        => $userId,
            'worker_type_id' => $data['worker_type_id'],
            'experience'     => $data['experience'],
            'description'    => $data['description'] ?? null,
            'hourly_rate'    => $data['hourly_rate'] ?? null,
            'latitude'       => $data['latitude'],
            'longitude'      => $data['longitude'],
            'is_available'   => true,
            'is_verified'    => false,
        ]);
    }

    public function getWorkerProfile($userId)
    {
        return Worker::where('user_id', $userId)->first();
    }

    public function updateWorkerProfile($userId, array $data)
    {
        $worker = Worker::where('user_id', $userId)->firstOrFail();

        $worker->update($data);

        return $worker;
    }
}
