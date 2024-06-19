<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Repo extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'owner',
        'readme',
        'json',
        'error_readme',
        'error_favicon',
        'error_gitignore',
        'error_pages',
        'error_protected',
        'error_cdn',
        'error_pull',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'error_readme' => 'boolean',
        'error_favicon' => 'boolean',
        'error_gitignore' => 'boolean',
        'error_pages' => 'boolean',
        'error_protected' => 'boolean',
        'error_cdn' => 'boolean',
        'error_pull' => 'boolean',
    ];
}
