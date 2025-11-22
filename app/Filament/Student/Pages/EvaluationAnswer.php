<?php

namespace App\Filament\Student\Pages;

use App\Models\EvaluationAnswer as EvaluationAnswerModel;
use App\Models\Evaluation;
use Filament\Pages\Page;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Radio;
use Illuminate\Support\Facades\Auth;

class EvaluationAnswer extends Page implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    protected string $view = 'filament.student.pages.evaluation-answer';
    protected static ?string $title = 'Evaluasi Mata Kuliah';

    public $evaluation_id;
    public $answers = [];

    public function mount(): void
    {
        // Initialize answers 1-30
        for ($i = 1; $i <= 30; $i++) {
            $this->answers[$i] = null;
        }
    }

    protected function getFormSchema(): array
    {
        $evaluations = Evaluation::whereHas('course', function ($q) {
            $q->whereHas('studentEnrollments', function ($q2) {
                $q2->where('student_id', Auth::id());
            });
        })
        ->with('course:id,name')
        ->get()
        ->pluck('course.name', 'id');

        return [
            Select::make('evaluation_id')
                ->label('Pilih Mata Kuliah')
                ->options($evaluations)
                ->required()
                ->reactive(),

            Fieldset::make('Pertanyaan Evaluasi')
                ->schema(
                    collect(range(1, 30))->map(fn($i) => Radio::make("answers.$i")
                        ->label("Pertanyaan $i")
                        ->options([
                            1 => '1 - Sangat Tidak Setuju',
                            2 => '2 - Tidak Setuju',
                            3 => '3 - Netral',
                            4 => '4 - Setuju',
                            5 => '5 - Sangat Setuju',
                        ])
                        ->required()
                    )->toArray()
                )
                ->columns(1),
        ];
    }

    public function submit()
    {
        foreach ($this->answers as $question => $rating) {
            EvaluationAnswerModel::create([
                'evaluation_id' => $this->evaluation_id,
                'question_number' => $question,
                'rating' => $rating,
            ]);
        }

        $this->notify('success', 'Evaluasi berhasil dikirim!');
    }
}
