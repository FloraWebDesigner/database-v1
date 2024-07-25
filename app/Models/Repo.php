<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repo extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'owner',
        'pull_requests',
        'error_readme_exists',
        'error_readme_contents',
        'error_favicon_exists',
        'error_gitignore_exists',
        'error_gitignore_contents',
        'error_protected',
        'error_description',
        'error_topics',
        'error_comments',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'error_readme_exists' => 'boolean',
        'error_readme_contents' => 'boolean',
        'error_favicon_exists' => 'boolean',
        'error_gitignore_exists' => 'boolean',
        'error_gitignore_contents' => 'boolean',
        'error_protected' => 'boolean',
        'error_description' => 'boolean',
        'error_topics' => 'boolean',
    ];
}
