<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tester extends Model
{
    use HasFactory;
    protected $primaryKey = 'tester_id';

    protected $fillable = [
        'user_id',
        'session_id',
        // 'name',
        // 'email'
    ];

    public function examSession(): BelongsTo
    {
        return $this->belongsTo(ExamSession::class, 'session_id');
    }

    public function questions(): HasMany
    {
        return $this->hasMany(Question::class, 'tester_id');
    }
}
