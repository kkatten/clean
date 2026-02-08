<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class ContactInfo extends Model
{
    protected $fillable = [
        'key',
        'label',
        'value',
        'sort_order',
    ];

    public static function getByKey(string $key): ?string
    {
        $all = static::getAllCached();
        return $all[$key] ?? null;
    }

    /** @return array<string, string> */
    public static function getAllCached(): array
    {
        return Cache::remember('contact_infos', 3600, function () {
            return static::orderBy('sort_order')->pluck('value', 'key')->all();
        });
    }

    protected static function booted(): void
    {
        static::saved(fn () => Cache::forget('contact_infos'));
        static::deleted(fn () => Cache::forget('contact_infos'));
    }
}
