<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EvaluationSummary extends Model
{
    protected $fillable = ['course_id', 'teacher_id', 'form_id', 'total_responses', 'avg_overall', 'indicator_averages', 'computed_at'];

    protected $casts = [
        'indicator_averages' => 'array',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function form()
    {
        return $this->belongsTo(EvaluationForm::class);
    }
}
