<?php

namespace App\Traits;

trait EnumArrayTrait
{
    public static function getValues(): array
    {
        return array_column(self::cases(), 'value');
    }
}
