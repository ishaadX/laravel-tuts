<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Tags;
use App\User;

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
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * calling Tags class
     *
     */
    public function tags()
    {
        return $this->belongsToMany(Tags::class, 'post_tag', 'post_id', 'tag_id')->withTimestamps();
    }
}
