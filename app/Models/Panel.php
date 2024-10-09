<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Panel extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'port_id',
        'cartridge',
        'city_id',
        'value',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'uid' => 'integer',
        'city_id' => 'integer',
        'value' => 'string',
    ];

    /**
     * The relationship to the City model (belongs to one city).
     */
    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
