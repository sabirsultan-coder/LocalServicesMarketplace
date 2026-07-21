<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\WorkerTypeResource;
use App\Services\WorkerTypeService;

class WorkerTypeController extends Controller
{
    protected $workerTypeService;

    public function __construct(WorkerTypeService $workerTypeService)
    {
        $this->workerTypeService = $workerTypeService;
    }

    public function index($categoryId)
    {
        $workerTypes = $this->workerTypeService->getWorkerTypesByCategory($categoryId);

        return WorkerTypeResource::collection($workerTypes);
    }
}
