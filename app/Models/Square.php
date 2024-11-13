<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Square extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'x',
        'y',
        'road',
        'road_rules',
        'track',
        'track_rules',
        'type',
        'building_id',
        'city_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'road' => 'boolean',
        'track' => 'boolean',
        'building_id' => 'integer',
        'city_id' => 'integer',
    ];

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function building(): BelongsTo
    {
        return $this->belongsTo(Building::class);
    }
}
