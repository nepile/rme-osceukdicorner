<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WaveSession extends Model
{
    use HasFactory;
    protected $primaryKey = 'wave_id';

    protected $fillable = [
        'session_id',
        // 'name',
        'start',
        'end'
    ];

    protected function examSession(): BelongsTo
    {
        return $this->belongsTo(ExamSession::class, 'session_id');
    }
}
