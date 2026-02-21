<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Service extends Model
{
    protected $fillable = [
        'slug',
        'title',
        'meta_description',
        'short_description',
        'description',
        'for_who',
        'what_included',
        'price',
        'image',
        'icon',
        'sort_order',
        'is_active',
        'views',
    ];

    protected $appends = ['image_url'];

    protected function casts(): array
    {
        return [
            'what_included' => 'array',
            'is_active' => 'boolean',
            'price' => 'decimal:2',
            'views' => 'integer',
        ];
    }

    public function getImageUrlAttribute(): ?string
    {
        if (blank($this->image)) {
            return null;
        }
        $path = ltrim(str_replace('\\', '/', $this->image), '/');
        return rtrim(app('url')->to('/'), '/') . '/storage/' . $path;
    }

    protected static function booted(): void
    {
        static::creating(function (Service $service): void {
            if (blank($service->slug) && filled($service->title)) {
                $base = Str::slug($service->title);
                $slug = $base;
                $n = 1;
                while (static::where('slug', $slug)->exists()) {
                    $slug = $base . '-' . (++$n);
                }
                $service->slug = $slug;
            }
        });
    }

    public function leads(): HasMany
    {
        return $this->hasMany(Lead::class);
    }

    public static function ordered(): \Illuminate\Database\Eloquent\Builder
    {
        return static::where('is_active', true)->orderBy('sort_order')->orderBy('id');
    }
}
