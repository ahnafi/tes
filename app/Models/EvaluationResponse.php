<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EvaluationResponse extends Model
{
    protected $fillable = ['evaluation_id', 'indicator_id', 'rating', 'comment'];

    public function evaluation()
    {
        return $this->belongsTo(Evaluation::class);
    }

    public function indicator()
    {
        return $this->belongsTo(FormIndicator::class);
    }
}
