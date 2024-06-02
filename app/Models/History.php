<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class History extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'question_id',
        'points',
    ];



    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
