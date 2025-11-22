<?php

namespace App\Filament\Student\Resources\EvaluationAnswers\Pages;

use App\Filament\Student\Resources\EvaluationAnswers\EvaluationAnswerResource;
use Filament\Resources\Pages\CreateRecord;

class CreateEvaluationAnswer extends CreateRecord
{
    protected static string $resource = EvaluationAnswerResource::class;
}
