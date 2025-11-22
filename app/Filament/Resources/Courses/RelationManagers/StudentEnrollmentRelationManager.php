<?php

namespace App\Filament\Resources\Courses\RelationManagers;

use App\Filament\Resources\StudentEnrollments\StudentEnrollmentResource;
use Filament\Actions\CreateAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;

class StudentEnrollmentRelationManager extends RelationManager
{
    protected static string $relationship = 'StudentEnrollments';
    protected static ?string $title = 'Daftar Siswa';

    protected static ?string $relatedResource = StudentEnrollmentResource::class;

    public function table(Table $table): Table
    {
        return $table
            ->headerActions([
                CreateAction::make("Tambah Siswa"),
            ]);
    }
}
