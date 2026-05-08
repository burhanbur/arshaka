<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'posts';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    // Status constants
    public const STATUS_DRAFT     = 0;
    public const STATUS_PUBLISHED = 1;

    protected $fillable = [
        'category_id',
        'title',
        'slug',
        'thumbnail',
        'content',
        'status',
        'published_at',
        'deleted_by',
        'created_by',
        'updated_by',
    ];

    protected $dates = ['deleted_at', 'published_at'];

    protected function casts(): array
    {
        return [
            'published_at' => 'datetime',
            'status'       => 'integer',
        ];
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            if (empty($post->id)) {
                $post->id = (string) uuidv7();
            }
        });
    }

    /**
     * Get the category that owns this post.
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    /**
     * Get the author of this post.
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Scope: only published posts.
     */
    public function scopePublished($query)
    {
        return $query->where('status', self::STATUS_PUBLISHED)
                     ->whereNotNull('published_at')
                     ->where('published_at', '<=', now());
    }

    /**
     * Get human-readable status label.
     */
    public function getStatusLabelAttribute(): string
    {
        return match ($this->status) {
            self::STATUS_PUBLISHED => 'Dipublikasikan',
            default                => 'Draft',
        };
    }

    /**
     * Get Bootstrap badge class for the status.
     */
    public function getStatusBadgeAttribute(): string
    {
        return match ($this->status) {
            self::STATUS_PUBLISHED => 'badge badge-success',
            default                => 'badge badge-secondary',
        };
    }

    /**
     * Get thumbnail URL with a fallback placeholder.
     */
    public function getThumbnailUrlAttribute(): string
    {
        if ($this->thumbnail && file_exists(public_path('storage/' . $this->thumbnail))) {
            return asset('storage/' . $this->thumbnail);
        }

        return asset('assets/media/misc/no-thumbnail.png');
    }
}
