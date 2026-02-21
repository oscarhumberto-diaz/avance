<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Material extends Model
{
    use HasFactory;

    public const TYPE_STUDENT_GUIDE = 'guia-estudiante';
    public const TYPE_LEADER_MANUAL = 'manual-lider';
    public const TYPE_PRESENTATION = 'presentacion';
    public const TYPE_MULTIMEDIA = 'multimedia';

    public const TYPES = [
        self::TYPE_STUDENT_GUIDE,
        self::TYPE_LEADER_MANUAL,
        self::TYPE_PRESENTATION,
        self::TYPE_MULTIMEDIA,
    ];

    protected $fillable = [
        'title',
        'type',
        'leaders_only',
        'principle_stage_id',
        'principle_id',
        'file_path',
        'file_name',
        'mime_type',
        'file_size',
    ];

    protected $casts = [
        'leaders_only' => 'boolean',
    ];

    public function stage(): BelongsTo
    {
        return $this->belongsTo(PrincipleStage::class, 'principle_stage_id');
    }

    public function principle(): BelongsTo
    {
        return $this->belongsTo(Principle::class);
    }
}
