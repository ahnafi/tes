<?php

namespace App\Filament\Widgets;

use App\Models\Evaluation;
use Filament\Widgets\ChartWidget;
use Carbon\Carbon;

class EvaluationChart extends ChartWidget
{
    protected ?string $heading = 'Grafik Evaluasi per Bulan';
    protected int | string | array $columnSpan = 'full';
    protected function getData(): array
    {
        $data = [];
        for ($i = 11; $i >= 0; $i--) {
            $date = Carbon::now()->subMonths($i);
            $count = Evaluation::whereYear('created_at', $date->year)
                ->whereMonth('created_at', $date->month)
                ->count();
            $data[] = $count;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Evaluasi',
                    'data' => $data,
                    'borderColor' => 'rgb(75, 192, 192)',
                    'tension' => 0.1,
                ],
            ],
            'labels' => array_map(fn($i) => Carbon::now()->subMonths(11 - $i)->format('M Y'), range(0, 11)),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
