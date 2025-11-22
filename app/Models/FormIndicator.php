<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormIndicator extends Model
{
    protected $fillable = ['form_id', 'section_id', 'code', 'prompt', 'display_order'];

    public function form()
    {
        return $this->belongsTo(EvaluationForm::class);
    }

    public function section()
    {
        return $this->belongsTo(EvaluationSection::class);
    }

    public function responses()
    {
        return $this->hasMany(EvaluationResponse::class, 'indicator_id');
    }
}
