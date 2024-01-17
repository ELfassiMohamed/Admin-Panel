<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum EmployeeStatus: string implements HasLabel, HasColor{

    case ACTIVE = 'Active';
    case INACTIVE = 'Inactive';
    case ON_LEAVE = 'On Leave';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::ACTIVE => 'Active',
            self::INACTIVE => 'Inactive',
            self::ON_LEAVE => 'On Leave',
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