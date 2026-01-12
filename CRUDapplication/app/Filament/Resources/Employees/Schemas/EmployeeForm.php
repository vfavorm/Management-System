<?php

namespace App\Filament\Resources\Employees\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use App\Models\Employee;

class EmployeeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('first_name')
                    ->label('First Name')
                    ->required()
                    ->minLength(3)
                    ->maxLength(50),

                TextInput::make('last_name')
                    ->label('Last Name')
                    ->required()
                    ->minLength(3)
                    ->maxLength(50),

                TextInput::make('email')
                    ->label('Email address')
                    ->required()
                    ->email()
                    ->maxLength(150)
                    ->unique(Employee::class, 'email', ignoreRecord:true),

                TextInput::make('phone')
                    ->label('Phone number')
                    ->required()
                    ->tel()
                    ->unique(Employee::class, 'phone', ignoreRecord:true)
                    ->rules(['required', 'digits:10', 'numeric'] )
                    ->helperText('Enter a valid phone number of 10 digits(numbers only and no spaces)')
                    ->validationAttribute('phone number'),
                                                     
                TextInput::make('position')
                    ->label('Job Title')
                    ->required()
                    ->minLength(3)
                    ->maxLength(50),

                TextInput::make('salary')
                    ->label('Salary')
                    ->required()
                    ->numeric()
                    ->minValue(1000)
                    ->maxValue(99999999.99)
                    ->step(0.01)
                    ->placeholder('5000.00')
                    ->helperText('Enter a valid salary between 1000 and 99,999,999.99'),

            ]);
    }
}

