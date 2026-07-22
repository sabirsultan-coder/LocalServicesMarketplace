<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\WorkerListingResource;
use App\Services\WorkerListingService;

class WorkerListingController extends Controller
{
    protected $workerListingService;

    public function __construct(WorkerListingService $workerListingService)
    {
        $this->workerListingService = $workerListingService;
    }

    public function index(Request $request)
    {
        $workers = $this->workerListingService->getWorkers(
            $request->only([
                'category_id',
                'worker_type_id',
                'search',
                'latitude',
                'longitude',
            ])
        );

        return response()->json([
            'success' => true,
            'message' => 'Workers retrieved successfully.',
            'data' => WorkerListingResource::collection($workers),
        ]);
    }
}
