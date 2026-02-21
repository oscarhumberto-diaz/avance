<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Principle extends Model
{
    use HasFactory;

    protected $fillable = [
        'principle_stage_id',
        'title',
        'description',
        'order',
    ];

    public function stage(): BelongsTo
    {
        return $this->belongsTo(PrincipleStage::class, 'principle_stage_id');
    }

    public function lessons(): HasMany
    {
        return $this->hasMany(PrincipleLesson::class)->orderBy('order');
    }
    public function materials(): HasMany
    {
        return $this->hasMany(Material::class)->latest();
    }

}
