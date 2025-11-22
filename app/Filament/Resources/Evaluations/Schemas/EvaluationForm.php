<?php

namespace App\Filament\Resources\Evaluations\Schemas;

use App\Models\Course;
use App\Models\User;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class EvaluationForm
{
    public static function configure(Schema $schema): Schema
    {
        $ratingOptions = [
            1 => '1',
            2 => '2',
            3 => '3',
            4 => '4',
        ];

        $sections = [
            'Section 1. Penilaian Pengajar' => [
                's1_q1' => 'Kamu memahami cara pengajar menjelaskan materi.',
                's1_q2' => 'Kamu mendapat jawaban yang jelas saat bertanya.',
                's1_q3' => 'Kamu merasa pengajar menguasai materinya.',
                's1_q4' => 'Kamu melihat pengajar memberi contoh yang relevan.',
                's1_q5' => 'Kamu melihat pengajar menjaga suasana kelas tetap kondusif.',
            ],
            'Section 2. Penilaian Materi' => [
                's2_q1' => 'Kamu merasa materi sesuai tujuan pembelajaran.',
                's2_q2' => 'Kamu menilai materi mudah kamu ikuti.',
                's2_q3' => 'Kamu melihat materi mendukung pemahaman topik.',
                's2_q4' => 'Kamu merasa materi terstruktur.',
                's2_q5' => 'Kamu menilai materi cukup lengkap.',
            ],
            'Section 3. Penilaian Proses Pembelajaran' => [
                's3_q1' => 'Kamu merasa jadwal dan alur pembelajaran jelas.',
                's3_q2' => 'Kamu mendapat alokasi waktu yang cukup untuk memahami materi.',
                's3_q3' => 'Kamu melihat aktivitas pembelajaran membuat kamu aktif.',
                's3_q4' => 'Kamu menilai tugas yang diberikan sesuai kemampuan kamu.',
                's3_q5' => 'Kamu merasa metode pembelajaran cocok untuk kamu.',
            ],
            'Section 4. Penilaian Media dan Sumber Belajar' => [
                's4_q1' => 'Kamu menilai media pembelajaran mudah digunakan.',
                's4_q2' => 'Kamu merasa media membantu memahami konsep sulit.',
                's4_q3' => 'Kamu melihat sumber belajar yang diberikan relevan.',
                's4_q4' => 'Kamu mendapat akses materi tanpa hambatan.',
                's4_q5' => 'Kamu menilai tampilan media mendukung fokus belajar.',
            ],
            'Section 5. Penilaian Hasil dan Manfaat Pembelajaran' => [
                's5_q1' => 'Kamu merasa pembelajaran meningkatkan pemahaman kamu.',
                's5_q2' => 'Kamu bisa mengerjakan latihan berdasarkan materi.',
                's5_q3' => 'Kamu melihat manfaat pembelajaran di luar kelas.',
                's5_q4' => 'Kamu merasa nilai yang kamu dapat mencerminkan usaha kamu.',
                's5_q5' => 'Kamu siap melanjutkan ke materi berikutnya berdasarkan hasil belajar kamu.',
            ],
        ];

        $questionFields = [];

        foreach ($sections as $sectionTitle => $questions) {
            foreach ($questions as $field => $label) {
                $questionFields[] = Select::make($field)
                    ->label($label)
                    ->options($ratingOptions)
                    ->required()
                    ->native(false);
            }
        }

        return $schema->components([
            Select::make('student_id')
                ->label('Siswa')
                ->options(User::whereHas('roles', fn($q) => $q->where('name', 'student'))->pluck('name', 'id'))
                ->required()
                ->searchable()
                ->preload(),

            Select::make('course_id')
                ->label('Kursus')
                ->options(Course::pluck('name', 'id'))
                ->required()
                ->searchable()
                ->preload(),

            Select::make('teacher_id')
                ->label('Guru')
                ->options(User::whereHas('roles', fn($q) => $q->where('name', 'teacher'))->pluck('name', 'id'))
                ->required()
                ->searchable()
                ->preload(),

            DateTimePicker::make('submitted_at')
                ->label('Dikirim Pada'),

            Textarea::make('notes')
            ->columnSpanFull()
                ->label('Catatan')
                ->rows(3)
                ->nullable(),

            ...$questionFields,
        ]);
    }
}
