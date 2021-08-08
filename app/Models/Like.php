<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'post_id'
    ];
    
    /**
     * Get the post that owns the like.
     */
    public function post()
    {
        return $this->belongsTo('App\Models\Post');
    }

    /**
    * Get the user that owns the like.
    */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

}
