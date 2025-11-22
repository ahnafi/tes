<?php

namespace App\Filament\Resources\EvaluationAnswers\Pages;

use App\Filament\Resources\EvaluationAnswers\EvaluationAnswerResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListEvaluationAnswers extends ListRecords
{
    protected static string $resource = EvaluationAnswerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
