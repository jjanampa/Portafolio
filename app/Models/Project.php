<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * @mixin \Illuminate\Database\Eloquent\Builder
 * @mixin \Illuminate\Database\Query\Builder
 */
class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'status',
        'image',
        'user_id',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    protected $attributes = [
        'status' => true,
    ];

    protected static function booted(): void
    {
        static::creating(function (Project $project) {
            $slug = Str::slug($project->name);
            $count = Project::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();
            $project->slug =  ($count > 0) ? "{$slug}-{$count}" : $slug;
        });
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the user's first name.
     *
     * @return Attribute
     */
    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value ? ((Str::isUrl($value)) ? $value : Storage::url($value)) : $value,
        );
    }
}
