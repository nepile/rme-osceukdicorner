<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SubQuestion extends Model
{
    use HasFactory;
    protected $primaryKey = 'subquestion_id';
    public $autoIncrement = false;
    protected $keyType = 'string';

    protected $fillable = [
        'subquestion_name',
        'subquestion_image',
        'question_id',
    ];

    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class, 'question_id');
    }

    public function answers(): HasMany
    {
        return $this->hasMany(AnswerExamination::class, 'subquestion_id');
    }
}
