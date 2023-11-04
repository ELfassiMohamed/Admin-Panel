<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Employee;
use Filament\Pages\Page;
use Illuminate\Support\Str;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Radio;
use Illuminate\Support\Facades\Hash;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Filament\Resources\Pages\CreateRecord;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Widgets\StatsOverviewWidget\Card;
use App\Filament\Resources\EmployeeResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\EmployeeResource\RelationManagers;
use App\Filament\Resources\EmployeeResource\Pages\EditEmployee;
use App\Filament\Resources\EmployeeResource\Pages\ListEmployees;
use App\Filament\Resources\EmployeeResource\Pages\CreateEmployee;

class EmployeeResource extends Resource
{
    protected static ?string $model = Employee::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('image')->image(),
                TextInput::make('first_name')->required(),
                TextInput::make('last_name')->required(),
                DatePicker::make('birth_date')->required(),
                Textarea::make('address')->rows(3)->required(),
                Select::make('department_id')
                    ->relationship('department', 'name')->required(),
                Select::make('employee_role')
                    ->options([
                        'R1' => 'Department Chef',
                        'R2' => '1st Employee',
                        'R3' => 'Intern',
                    ])->required(),
                TextInput::make('email')
                ->required()
                    ->label('Email Address')
                    ->email()
                    ->suffix('@test.com'),
                    TextInput::make('phone')->required(),
                    Radio::make('employee_status')
                    ->options([
                        'S1' => 'Active',
                        'S2' => 'Postpond',
                        'S3' => 'Not Active',
                    ])->inline()->required(),
                    
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->searchable(),
                ImageColumn::make('image')->circular(),
                TextColumn::make('full_name')->searchable(),
                TextColumn::make('department.name')->sortable()->searchable(),
                TextColumn::make('employee_role')->enum([
                    'R1' => 'Department Chef',
                    'R2' => '1st Employee',
                    'R3' => 'Intern',
                ])->searchable(),
                TextColumn::make('employee_status')->enum([
                    'S1' => 'Active',
                        'S2' => 'Postpond',
                        'S3' => 'Not Active',
                ])->searchable(),
                TextColumn::make('password')->searchable(),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEmployees::route('/'),
            'create' => Pages\CreateEmployee::route('/create'),
            'edit' => Pages\EditEmployee::route('/{record}/edit'),
        ];
    }
}
