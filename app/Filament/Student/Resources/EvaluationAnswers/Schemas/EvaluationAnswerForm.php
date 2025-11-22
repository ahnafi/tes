<?php

namespace App\Filament\Student\Resources\EvaluationAnswers\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class EvaluationAnswerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('evaluation_id')
                    ->required()
                    ->numeric(),
                TextInput::make('question_number')
                    ->required()
                    ->numeric(),
                TextInput::make('rating')
                    ->required()
                    ->numeric(),
            ]);
    }
}
