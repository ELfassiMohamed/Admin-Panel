<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum EmployeeRoles: string implements HasLabel{

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
}