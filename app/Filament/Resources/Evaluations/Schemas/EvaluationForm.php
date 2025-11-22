<?php

namespace App\Filament\Resources\Evaluations\Schemas;

use App\Models\Course;
use App\Models\EvaluationForm as Form;
use App\Models\User;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class EvaluationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('student_id')
                    ->label('Student')
                    ->options(User::whereHas('roles', function ($query) {
                        $query->where('name', 'student');
                    })->pluck('name', 'id'))
                    ->required()
                    ->searchable()
                    ->preload(),
                Select::make('course_id')
                    ->label('Course')
                    ->options(Course::pluck('name', 'id'))
                    ->required()
                    ->searchable()
                    ->preload(),
                Select::make('teacher_id')
                    ->label('Teacher')
                    ->options(User::whereHas('roles', function ($query) {
                        $query->where('name', 'teacher');
                    })->pluck('name', 'id'))
                    ->required()
                    ->searchable()
                    ->preload(),
                DateTimePicker::make('submitted_at'),
            ]);
    }
}
