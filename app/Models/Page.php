<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'slug',
        'title',
        'meta_description',
        'blocks',
        'sort_order',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'blocks' => 'array',
            'is_active' => 'boolean',
        ];
    }

    public static function findBySlug(string $slug): ?self
    {
        return static::where('slug', $slug)->where('is_active', true)->first();
    }
}
