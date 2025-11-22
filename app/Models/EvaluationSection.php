<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EvaluationSection extends Model
{
    protected $fillable = ['form_id', 'name', 'display_order'];

    public function form()
    {
        return $this->belongsTo(EvaluationForm::class);
    }

    public function indicators()
    {
        return $this->hasMany(FormIndicator::class, 'section_id');
    }
}
