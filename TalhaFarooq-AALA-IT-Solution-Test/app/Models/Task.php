<?php

namespace App\Models;

use App\Enums\TaskStatusEnum;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['title', 'description', 'status', 'user_id'];
    protected $casts = [
        'status' => TaskStatusEnum::class
    ];
}
