<?php

namespace App\Models;

use App\Enums\Days;
use App\Enums\QuestionType;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Traits\CreatedUpdatedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Question extends Model
{
    use CreatedUpdatedBy;


    protected $fillable = [
        'level_id',
        'label',
        'points',
        'type',
        'day',
        'sort_order'
    ];

    protected $casts = [
        'type' => QuestionType::class,
        'day' => Days::class,
    ];

    //realtions

    public function level(): BelongsTo
    {
        return $this->belongsTo(Level::class);
    }

    public function options(): HasMany
    {
        return $this->hasMany(Option::class);
    }
}
