<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\CreatedUpdatedBy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Level extends Model
{
    use HasFactory;

    use CreatedUpdatedBy;

    protected $fillable = [
        'label',
        'value',
        'sort_order',
    ];


    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo($this::class, 'parent_id');
    }

    public function versions(): HasMany
    {
        return $this->hasMany($this::class, 'parent_id');
    }
}
