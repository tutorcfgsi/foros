<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reply extends Model
{
    use HasFactory;

    protected $table = 'replies';

    protected $fillable = [
        'user_id', 'post_id', 'reply',
    ];

    // Para poder acceder al Foro desde esta tabla crearemos un atributo extra
    protected  $appends = ['forum'];

    public function post(): BelongsTo {
    	return $this->belongsTo(Post::class, 'post_id');
    }

    public function autor(): BelongsTo {
    	return $this->belongsTo(User::class, 'user_id');
    }

    // Y aquí definimos el Atributo extra
    // Para hacer eso, la función debe comenzar por "get"
    // y finalizar por "Attribute" (y lo de en medio CamelCase)
    public function getForumAttribute() {
    	return $this->post->forum;
    }
}
