<?php

namespace App\Filament\Exports;

use App\Models\Evaluation;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;
use Illuminate\Support\Number;

class EvaluationExporter extends Exporter
{
    protected static ?string $model = Evaluation::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('id')
                ->label('ID'),
            ExportColumn::make('student_id'),
            ExportColumn::make('course_id'),
            ExportColumn::make('teacher_id'),
            ExportColumn::make('submitted_at'),
            ExportColumn::make('s1_q1'),
            ExportColumn::make('s1_q2'),
            ExportColumn::make('s1_q3'),
            ExportColumn::make('s1_q4'),
            ExportColumn::make('s1_q5'),
            ExportColumn::make('s2_q1'),
            ExportColumn::make('s2_q2'),
            ExportColumn::make('s2_q3'),
            ExportColumn::make('s2_q4'),
            ExportColumn::make('s2_q5'),
            ExportColumn::make('s3_q1'),
            ExportColumn::make('s3_q2'),
            ExportColumn::make('s3_q3'),
            ExportColumn::make('s3_q4'),
            ExportColumn::make('s3_q5'),
            ExportColumn::make('s4_q1'),
            ExportColumn::make('s4_q2'),
            ExportColumn::make('s4_q3'),
            ExportColumn::make('s4_q4'),
            ExportColumn::make('s4_q5'),
            ExportColumn::make('s5_q1'),
            ExportColumn::make('s5_q2'),
            ExportColumn::make('s5_q3'),
            ExportColumn::make('s5_q4'),
            ExportColumn::make('s5_q5'),
            ExportColumn::make('notes'),
            ExportColumn::make('created_at'),
            ExportColumn::make('updated_at'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your evaluation export has completed and ' . Number::format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . Number::format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
