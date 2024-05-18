<?php

namespace App\Models;

use App\Enums\Roles;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;


    protected $fillable = ['name'];

    protected $casts = [
        'name' => Roles::class,
    ];

    public $timestamps = false;
}
