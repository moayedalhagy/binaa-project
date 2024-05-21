<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Traits\CreatedUpdatedBy;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use CreatedUpdatedBy;
    use HasApiTokens;

    protected $fillable = [
        'name',
        'username',
        'password',
        'role_id',
        'last_activity_time'
    ];


    // تشفير كلمة المرور قبل ترحيلها الى قاعدة البيانات
    protected function password(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) =>  $value,
            set: fn (string $value) => Hash::make($value),

        );
    }


    protected $hidden = [
        'password'
    ];


    //realtions

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }
}
