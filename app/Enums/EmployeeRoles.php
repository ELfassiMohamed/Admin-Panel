<?php

namespace App\Enums;

use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum EmployeeRoles: string implements HasLabel, HasIcon{

    case software_developer = 'Software Developer';
    case frontend_developer = 'Front-end Developer';
    case backend_developer = 'Back-end Developer';
    case fullstack_developer = 'Full-stack Developer';
    case devops_engineer = 'DevOps Engineer';
    case it_support_specialist = 'IT Support Specialist';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::software_developer => 'Software Developer',
            self::frontend_developer => 'Front-end Developer',
            self::backend_developer => 'Back-end Developer',
            self::fullstack_developer => 'Full-stack Developer',
            self::devops_engineer => 'DevOps Engineer',
            self::it_support_specialist => 'IT Support Specialist',
        };
    }

    public function getIcon(): ?string
    {
        return match ($this) {
            self::software_developer => 'heroicon-m-adjustments-horizontal',
            self::frontend_developer => 'heroicon-m-paint-brush',
            self::backend_developer => 'heroicon-m-inbox-stack',
            self::fullstack_developer => 'heroicon-m-square-3-stack-3d',
            self::devops_engineer => 'heroicon-m-cog',
            self::it_support_specialist => 'heroicon-m-wrench-screwdriver',
        };
    }
}