<?php

namespace App\Filament\Resources\EvaluationAnswers;

use App\Filament\Resources\EvaluationAnswers\Pages\CreateEvaluationAnswer;
use App\Filament\Resources\EvaluationAnswers\Pages\EditEvaluationAnswer;
use App\Filament\Resources\EvaluationAnswers\Pages\ListEvaluationAnswers;
use App\Filament\Resources\EvaluationAnswers\Schemas\EvaluationAnswerForm;
use App\Filament\Resources\EvaluationAnswers\Tables\EvaluationAnswersTable;
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
