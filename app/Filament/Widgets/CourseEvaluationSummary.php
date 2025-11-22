<?php

namespace App\Filament\Widgets;

use App\Models\Course;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;

class CourseEvaluationSummary extends TableWidget
{
    protected static ?string $heading = 'Rangkuman Evaluasi per Kelas';
        protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(fn (): Builder => Course::with('evaluations'))
            ->columns([
                TextColumn::make('name')
                    ->label('Nama Kelas')
                    ->sortable(),
                TextColumn::make('evaluations_count')
                    ->label('Jumlah Evaluasi')
                    ->counts('evaluations'),
                TextColumn::make('average_rating')
                    ->label('Rata-rata Rating')
                    ->getStateUsing(function (Course $record) {
                        $answers = $record->evaluations->flatMap->evaluationAnswers;
                        if ($answers->isEmpty()) return 'N/A';
                        return round($answers->avg('rating'), 2);
                    }),
            ])
            ->filters([
                //
            ]);
    }
}
