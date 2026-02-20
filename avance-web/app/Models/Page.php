<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'title',
        'excerpt',
        'body',
        'status',
        'published_at',
        'parent_id',
        'order',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function parent(): BelongsTo
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(self::class, 'parent_id')->orderBy('order');
    }

    public function scopePublished($query)
    {
        return $query
            ->where('status', 'published')
            ->where(function ($subQuery) {
                $subQuery
                    ->whereNull('published_at')
                    ->orWhere('published_at', '<=', now());
            });
    }
}
