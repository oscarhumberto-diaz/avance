<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public const CATEGORY_DOCTRINA = 'doctrina';
    public const CATEGORY_NOTICIAS = 'noticias';
    public const CATEGORY_CONSEJOS = 'consejos';
    public const CATEGORY_FAQ = 'faq';

    public const CATEGORIES = [
        self::CATEGORY_DOCTRINA,
        self::CATEGORY_NOTICIAS,
        self::CATEGORY_CONSEJOS,
        self::CATEGORY_FAQ,
    ];

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'category',
        'status',
        'published_at',
        'meta_title',
        'meta_description',
        'og_title',
        'og_description',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

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

    public function categoryLabel(): string
    {
        return match ($this->category) {
            self::CATEGORY_DOCTRINA => 'Doctrina',
            self::CATEGORY_NOTICIAS => 'Noticias',
            self::CATEGORY_CONSEJOS => 'Consejos',
            self::CATEGORY_FAQ => 'FAQ',
            default => ucfirst((string) $this->category),
        };
    }
}
