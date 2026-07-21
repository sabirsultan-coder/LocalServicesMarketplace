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
        'latitude',
        'longitude',
        'is_available'
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
