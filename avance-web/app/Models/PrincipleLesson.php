<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PrincipleLesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'principle_id',
        'title',
        'summary',
        'order',
    ];

    public function principle(): BelongsTo
    {
        return $this->belongsTo(Principle::class);
    }
}
