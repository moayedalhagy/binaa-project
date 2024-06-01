<?php

namespace App\Models;

use App\Enums\Days;
use App\Enums\QuestionType;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Traits\CreatedUpdatedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


use App\Observers\QuestionObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;

#[ObservedBy([QuestionObserver::class])]
class Question extends Model
{
    use CreatedUpdatedBy;


    protected $fillable = [
        'version_id',
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

    public function version(): BelongsTo
    {
        return $this->belongsTo(Version::class);
    }

    public function options(): HasMany
    {
        return $this->hasMany(Option::class);
    }
}
