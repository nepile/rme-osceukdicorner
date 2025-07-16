<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Question extends Model
{
    use HasFactory;
    protected $primaryKey = 'question_id';
    public $autoIncrement = false;
    protected $keyType = 'string';

    protected $fillable = [
        'question_name',
        'tester_id',
    ];

    public function tester(): BelongsTo
    {
        return $this->belongsTo(Tester::class, 'tester_id');
    }

    public function subQuestions(): HasMany
    {
        return $this->hasMany(SubQuestion::class, 'question_id');
    }
}
