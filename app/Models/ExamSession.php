<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ExamSession extends Model
{
    use HasFactory;
    protected $primaryKey = 'session_id';
    public $autoIncrement = false;
    protected $keyType = 'string';

    protected $fillable = [
        'date',
        'status',
    ];

    public function testers(): HasMany
    {
        return $this->hasMany(Tester::class, 'session_id');
    }

    public function waveSessions(): HasMany
    {
        return $this->hasMany(WaveSession::class, 'session_id');
    }

    public function examDate(): HasOne
    {
        return $this->hasOne(ExamDate::class, 'session_id');
    }
}
