<?php

namespace App\Filament\Resources\Courses\Schemas;

use App\Models\User;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class CourseForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('code')
                    ->required()
                    ->maxLength(255),
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Select::make('teacher_id')
                    ->label('Teacher')
                    ->options(User::whereHas('roles', function ($query) {
                        $query->where('name', 'teacher');
                    })->pluck('name', 'id'))
                    ->required()
                    ->searchable()
                    ->preload(),
                DatePicker::make('start_date')
                    ->required(),
                DatePicker::make('end_date')
                    ->required(),
            ]);
    }
}
