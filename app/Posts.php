<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'post_title', 'post_content', 'post_thumbnail'
    ];
    /**
     * calling User class
     *
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
