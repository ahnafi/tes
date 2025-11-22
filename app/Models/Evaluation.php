<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    protected $fillable = ['student_id', 'course_id', 'teacher_id', 'submitted_at'];

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

    public function answers()
    {
        return $this->hasMany(EvaluationAnswer::class);
    }

    public function responses()
    {
        return $this->hasMany(EvaluationResponse::class);
    }
}
