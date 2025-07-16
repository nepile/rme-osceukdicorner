<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AnswerExamination extends Model
{
    use HasFactory;
    protected $primaryKey = 'answerexamination_id';
    public $autoIncrement = false;
    protected $keyType = 'string';

    protected $fillable = [
        'participant_id',
        'subquestion_id',
        'answer',
    ];

    public function subQuestion(): BelongsTo
    {
        return $this->belongsTo(SubQuestion::class, 'subquestion_id');
    }
}
