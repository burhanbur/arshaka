<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FleetPhoto extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'fleet_photos';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'fleet_category_id',
        'caption',
        'image_path',
        'order',
        'is_active',
        'created_by',
        'updated_by',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'order'     => 'integer',
        ];
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->id)) {
                $model->id = (string) uuidv7();
            }
        });
    }

    public function fleetCategory()
    {
        return $this->belongsTo(FleetCategory::class, 'fleet_category_id');
    }
}
