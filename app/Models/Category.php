<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $fillable = ['name', 'description'];

    public function reports(): HasMany
    {
        return $this->hasMany(Report::class);
    }

    public function admins(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'admin_category', 'category_id', 'admin_id');
    }
}
