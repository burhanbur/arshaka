<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'categories';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'name',
        'slug',
        'description',
        'deleted_by',
        'created_by',
        'updated_by',
    ];

    protected $dates = ['deleted_at'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($category) {
            if (empty($category->id)) {
                $category->id = (string) uuidv7();
            }
        });
    }

    /**
     * Get all posts belonging to this category.
     */
    public function posts()
    {
        return $this->hasMany(Post::class, 'category_id');
    }

    /**
     * Get only published posts belonging to this category.
     */
    public function publishedPosts()
    {
        return $this->hasMany(Post::class, 'category_id')
                    ->where('status', Post::STATUS_PUBLISHED);
    }
}

