<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use AnourValar\EloquentSerialize\Tests\Models\User;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model
{
    protected $fillable = [
        'name',
    ];

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
