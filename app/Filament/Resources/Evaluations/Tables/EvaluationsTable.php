<?php

namespace App\Filament\Resources\Evaluations\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class EvaluationsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(function (Builder $query) {
                if (auth()->user()->hasRole('teacher')) {
                    $query->where('teacher_id', auth()->id());
                }
                return $query;
            })
            ->columns([
                TextColumn::make('student.name')
                    ->label('Siswa')
                    ->sortable(),
                TextColumn::make('course.name')
                    ->label('Kursus')
                    ->sortable(),
                TextColumn::make('teacher.name')
                    ->label('Guru')
                    ->sortable(),
                TextColumn::make('submitted_at')
                    ->label('Dikirim Pada')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()
                    ->visible(fn() => auth()->user()->hasRole('admin')),
                ]),
            ]);
    }
}
