<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum Department: string implements HasLabel{

    case IT = 'IT Department';
    case DEV = 'Software Dev Department';
    case DEV_OPS = 'Dev ops Deptartment';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::IT => 'IT Department',
            self::DEV => 'Software Dev Department',
            self::DEV_OPS => 'Dev ops Deptartment',
        };
    }
}