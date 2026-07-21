<?php

namespace App\Services;

use App\Models\WorkerType;

class WorkerTypeService
{
    public function getWorkerTypesByCategory($categoryId)
    {
        return WorkerType::where('category_id', $categoryId)
            ->orderBy('name')
            ->get();
    }
}
