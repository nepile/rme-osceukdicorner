<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnswerDiagnosis extends Model
{
    use HasFactory;
    protected $primaryKey = 'answerdiagnosis_id';
    public $autoIncrement = false;
    protected $keyType = 'string';

    protected $fillable = [
        'participant_id',
        'tester_id',
        'diagnosis1',
        'diagnosis2',
        'diagnosis3',
    ];
}
