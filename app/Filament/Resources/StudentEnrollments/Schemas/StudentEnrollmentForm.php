<?php

namespace App\Filament\Resources\StudentEnrollments\Schemas;

use App\Models\Course;
use App\Models\User;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class StudentEnrollmentForm
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
                DateTimePicker::make('enrolled_at')
                    ->required(),
            ]);
    }
}
