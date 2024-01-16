<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum EmployeeStatus: string implements HasLabel, HasColor{

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

    public function getColor(): string | array | null
    {
        return match ($this) {
            self::ON_LEAVE => 'gray',
            self::ACTIVE => 'success',
            self::INACTIVE=> 'danger',
        };
    }
}