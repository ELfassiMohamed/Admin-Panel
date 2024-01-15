<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum EmployeeStatus: string implements HasLabel{

    case ACTIVE = 'active';
    case INACTIVE = 'inactive';
    case ON_LEAVE = 'on_leave';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::ACTIVE => 'active',
            self::INACTIVE => 'inactive',
            self::ON_LEAVE => 'on_leave',
        };
    }
}