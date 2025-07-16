<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EnrolledParticipant extends Model
{
    use HasFactory;
    protected $primaryKey = 'enrolled_id';
    public $autoIncrement = false;
    protected $keyType = 'string';

    protected $fillable = [
        'participant_id',
        'participant_name',
        'participant_email',
        'tester_id',
        'start',
        'end',
        'examination',
        'diagnosis',
        'therapy',
        'examination_score',
        'diagnosis_score',
        'therapy_score',
    ];

    public function tester(): BelongsTo
    {
        return $this->belongsTo(Tester::class, 'tester_id');
    }
}
