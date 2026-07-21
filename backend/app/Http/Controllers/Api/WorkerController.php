<?php

 namespace App\Http\Controllers\Api;

 use App\Http\Controllers\Controller;
 use App\Http\Requests\WorkerProfileRequest;
 use App\Http\Requests\UpdateWorkerProfileRequest;
 use App\Http\Resources\WorkerResource;
 use App\Services\WorkerService;

 class WorkerController extends Controller
 {
     protected $workerService;

     public function __construct(WorkerService $workerService)
     {
         $this->workerService = $workerService;
     }

     public function store(WorkerProfileRequest $request)
     {
         $worker = $this->workerService->createWorkerProfile(
             $request->user()->id,
             $request->validated()
         );

         return response()->json([
             'success' => true,
             'message' => 'Worker profile created successfully.',
             'data' => new WorkerResource($worker),
         ], 201);
     }

     public function show()
     {
         $worker = $this->workerService->getWorkerProfile(auth()->id());

         return response()->json([
             'success' => true,
             'data' => new WorkerResource($worker),
         ]);
     }

     public function update(UpdateWorkerProfileRequest $request)
     {
         $worker = $this->workerService->updateWorkerProfile(
             auth()->id(),
             $request->validated()
         );

         return response()->json([
             'success' => true,
             'message' => 'Worker profile updated successfully.',
             'data' => new WorkerResource($worker),
         ]);
     }
 }
