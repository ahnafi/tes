<?php

namespace App\Filament\Resources\EvaluationAnswers\Pages;

use App\Filament\Resources\EvaluationAnswers\EvaluationAnswerResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditEvaluationAnswer extends EditRecord
{
    protected static string $resource = EvaluationAnswerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
