<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Employee;
use Filament\Pages\Page;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Hash;
use Filament\Forms\Components\Select;
use Filament\Tables\Actions\EditAction;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
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

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('first_name'),
                TextInput::make('last_name'),
                DatePicker::make('birth_date'),
                Select::make('department_id')
                ->relationship('department', 'name')->required(),
                Select::make('user_role')
                ->options([
                    'department_chef' => 'Department Chef',
                    'professor' => 'Professor',
                    'student' => 'Student',
                ])->required(),
                TextInput::make('email')
                ->label('Email Address')
                 ->url()
                 ->suffix('@test.com'),
                 TextInput::make('password')->password()
                 ->required(fn(Page $Livewire): bool => $Livewire instanceof CreateRecord)
                 ->minLength(8)
                 ->same('passwordConfirmation')->dehydrated(fn ($state) => filled($state))
                 ->dehydrateStateUsing(fn ($state) => Hash::make($state)),
                 
                 TextInput::make('passwordConfirmation')->label('Pasword Confirmation')->password()
                 ->required(fn(Page $Livewire): bool => $Livewire instanceof CreateRecord)
                 ->minLength(8)
                 ->dehydrated(false)
                        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
