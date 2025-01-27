<?php

namespace App\Enums;

use App\Traits\EnumArrayTrait;

enum TaskStatusEnum:string
{
    use EnumArrayTrait;
    case Pending = 'pending';
    case InProgress = 'in_progress';
    case Completed = 'completed';
}
