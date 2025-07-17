<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Report extends Model
{
    protected $fillable = [
        'user_id',
        'category_id',
        'image_path',
        'latitude',
        'longitude',
        'location_detail',
        'description',
        'status_sent',
        'status_verified',
        'status_fixed',
    ];

    protected $casts = [
        'status_sent' => 'boolean',
        'status_verified' => 'boolean',
        'status_fixed' => 'boolean',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function article(): HasOne
    {
        return $this->hasOne(Article::class);
    }
}
