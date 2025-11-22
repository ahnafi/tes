<?php

namespace App\Filament\Student\Resources\EvaluationAnswers;

use App\Filament\Student\Resources\EvaluationAnswers\Pages\CreateEvaluationAnswer;
use App\Filament\Student\Resources\EvaluationAnswers\Pages\EditEvaluationAnswer;
use App\Filament\Student\Resources\EvaluationAnswers\Pages\ListEvaluationAnswers;
use App\Filament\Student\Resources\EvaluationAnswers\Schemas\EvaluationAnswerForm;
use App\Filament\Student\Resources\EvaluationAnswers\Tables\EvaluationAnswersTable;
use App\Models\EvaluationAnswer;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class EvaluationAnswerResource extends Resource
{
    protected static ?string $model = EvaluationAnswer::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'EvaluationAnswer';

    public static function form(Schema $schema): Schema
    {
        return EvaluationAnswerForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return EvaluationAnswersTable::configure($table);
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
            'index' => ListEvaluationAnswers::route('/'),
            'create' => CreateEvaluationAnswer::route('/create'),
            'edit' => EditEvaluationAnswer::route('/{record}/edit'),
        ];
    }
}
