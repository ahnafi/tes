<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EvaluationForm extends Model
{
    protected $fillable = ['name', 'description', 'is_active', 'effective_from', 'effective_to'];

    public function sections()
    {
        return $this->hasMany(EvaluationSection::class, 'form_id');
    }

    public function indicators()
    {
        return $this->hasMany(FormIndicator::class, 'form_id');
    }

    public function evaluations()
    {
        return $this->hasMany(Evaluation::class, 'form_id');
    }
}
