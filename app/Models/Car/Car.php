<?php

namespace App\Models\Car;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class Car extends Model
{
    use HasFactory;

    protected $fillable = ['model_id', 'photo', 'price'];

    public function brand(): HasOneThrough
    {
        return $this->hasOneThrough(
            Brand::class,
            CarModel::class,
            'id',
            'id'
        );
    }

    public function carModel(): BelongsTo
    {
        return $this->belongsTo(CarModel::class);
    }

    public function scopeWithAll($query): void
    {
        $query->with('brand', 'carModel');
    }
}
