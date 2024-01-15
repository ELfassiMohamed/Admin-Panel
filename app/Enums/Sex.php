<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum Sex: string implements HasLabel{

    case H = 'Men';
    case F = 'Women';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::H => 'Men',
            self::F => 'Women',
        };
    }
}