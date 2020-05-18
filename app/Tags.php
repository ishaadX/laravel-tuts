<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Posts;

class Tags extends Model
{
    /**
     * calling User class
     *
     */
    public function posts()
    {
        return $this->belongsToMany(Posts::class, 'post_tag', 'tag_id', 'post_id')->withTimestamps();
    }
}
