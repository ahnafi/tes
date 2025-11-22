<?php

namespace App\Filament\Student\Widgets;

use Filament\Widgets\Widget;
use App\Models\StudentEnrollment;

class ClassesWidget extends Widget
{
    protected string $view = 'filament.student.widgets.classes-widget';

    protected int | string | array $columnSpan = 'full';

    protected function getViewData(): array
    {
        return [
            'classes' => StudentEnrollment::with('course')
                ->where('student_id', auth()->id())
                ->get(),
        ];
    }
}
