<?php

namespace App\Filament\Widgets;

use App\Models\Course;
use App\Models\Evaluation;
use App\Models\StudentEnrollment;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Jumlah Siswa', User::whereHas('roles', fn($q) => $q->where('name', 'student'))->count())
                ->description('Total siswa terdaftar')
                ->descriptionIcon('heroicon-m-users')
                ->color('success'),
            Stat::make('Jumlah Kelas', Course::count())
                ->description('Total kursus yang tersedia')
                ->descriptionIcon('heroicon-m-book-open')
                ->color('primary'),
            Stat::make('Pendaftaran Siswa', StudentEnrollment::count())
                ->description('Total pendaftaran siswa')
                ->descriptionIcon('heroicon-m-user-group')
                ->color('info'),
            Stat::make('Evaluasi', Evaluation::count())
                ->description('Total evaluasi yang dilakukan')
                ->descriptionIcon('heroicon-m-clipboard-document-list')
                ->color('warning'),
        ];
    }
}
