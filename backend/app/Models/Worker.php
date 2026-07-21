<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Worker extends Model
{
    protected $fillable = [
        'user_id',
        'worker_type_id',
        'experience',
        'description',
        'hourly_rate',
        'latitude',
        'longitude',
        'is_available',
        'is_verified',
        'profile_image',
    ];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    public function workerType(): BelongsTo
    {
        return $this->belongsTo(WorkerType::class);
    }
}
