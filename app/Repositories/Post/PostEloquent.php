<?php

namespace App\Repositories\Post;

use App\Repositories\Post\PostInterface;
use App\Posts; //post db model

class PostEloquent implements PostInterface
{
    private $model;

    function __construct(Posts $model)
    {
        $this->model = $model;
    }
    public function getAll()
    {
        return $this->model->all();
    }
}
