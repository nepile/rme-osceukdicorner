<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ExamDate extends Model
{
    use HasFactory;
    protected $primaryKey = 'date_id';
    public $timestamps = false;

    protected $fillable = [
        'session_id',
        'date'
    ];

    public function examSession(): BelongsTo
    {
        return $this->belongsTo(ExamSession::class, 'session_id');
    }
}
