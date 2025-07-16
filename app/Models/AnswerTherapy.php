<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnswerTherapy extends Model
{
    use HasFactory;
    protected $primaryKey = 'answertherapy_id';
    public $autoIncrement = false;
    protected $keyType = 'string';

    protected $fillable = [
        'participant_id',
        'rslash1',
        'rslash2',
        'rslash3',
        'rslash4',
    ];
}
