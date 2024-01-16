<?php

namespace App\Filament\Resources;

use App\Enums\Department;
use App\Enums\EmployeeRoles;
use App\Enums\EmployeeStatus;
use App\Enums\Sex;
use Filament\Forms;
use Filament\Tables;
use App\Models\Employee;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Resources\Components\Tab;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\EmployeeResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\EmployeeResource\RelationManagers;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;

class EmployeeResource extends Resource
{
    protected static ?string $model = Employee::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('Tabs')
                        ->tabs([
                            Tabs\Tab::make('Personnel Infos')
                                ->schema([
                                    FileUpload::make('image')->nullable()->image(),
                                    TextInput::make('first_name')->required(),
                                    TextInput::make('last_name')->required(),
                                    DatePicker::make('birth_date'),
                                    Radio::make('sex')
                                    ->options(Sex::class)
                                    ->inline(),
                                ]),
                        ]),
                 Tabs::make('Tabs')
                        ->tabs([
                            Tabs\Tab::make('Employee Infos')
                                ->schema([
                                    Select::make('employee_role')
                                    ->options(EmployeeRoles::class)
                                    ->required(),
                                    Select::make('department')
                                    ->options(Department::class)
                                    ->required(),
                                    Radio::make('employee_status')
                                    ->options(EmployeeStatus::class)
                                    ->inline(),
                                    TextInput::make('phone')->required()
                                ]),
                        ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')->disk('public'),
                TextColumn::make('full_name'),
                TextColumn::make('employee_number'),
                TextColumn::make('employee_status')->badge(),
                TextColumn::make('department')->badge(),
                
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
