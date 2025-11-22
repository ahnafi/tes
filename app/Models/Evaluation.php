<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    protected $fillable = [
        'student_id',
        'course_id',
        'teacher_id',
        'submitted_at',
        'notes',
        's1_q1', 's1_q2', 's1_q3', 's1_q4', 's1_q5',
        's2_q1', 's2_q2', 's2_q3', 's2_q4', 's2_q5',
        's3_q1', 's3_q2', 's3_q3', 's3_q4', 's3_q5',
        's4_q1', 's4_q2', 's4_q3', 's4_q4', 's4_q5',
        's5_q1', 's5_q2', 's5_q3', 's5_q4', 's5_q5',
    ];

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }
}
