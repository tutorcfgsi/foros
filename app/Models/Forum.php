<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Forum extends Model
{
    use HasFactory;

    protected $table = 'forums';

    protected $fillable = [
        'name',
        'description'
    ];

    public function posts(): HasMany {
        return $this->hasMany(Post::class);
    }

    public function replies(): HasManyThrough {
        return $this->hasManyThrough(Reply::class, Post::class);
    }
}
