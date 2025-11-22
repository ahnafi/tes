<?php

namespace App\Filament\Resources\EvaluationAnswers\Schemas;

use App\Models\Evaluation;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class EvaluationAnswerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('evaluation_id')
                    ->label('Evaluation')
                    ->options(Evaluation::with('student', 'course')->get()->mapWithKeys(function ($evaluation) {
                        return [$evaluation->id => $evaluation->student->name . ' - ' . $evaluation->course->name];
                    }))
                    ->required()
                    ->searchable()
                    ->preload(),
                Select::make('question_number')
                    ->label('Question Number')
                    ->options(array_combine(range(1, 30), range(1, 30)))
                    ->required(),
                Select::make('rating')
                    ->label('Rating')
                    ->options([
                        1 => '1',
                        2 => '2',
                        3 => '3',
                        4 => '4',
                    ])
                    ->required(),
            ]);
    }
}
