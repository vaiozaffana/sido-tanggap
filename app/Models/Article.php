<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
    protected $fillable = [
        'report_id',
        'title',
        'content',
        'image_path',
        'published_at',
    ];

    protected $dates = ['published_at'];

    public function report(): BelongsTo
    {
        return $this->belongsTo(Report::class);
    }
}
