<?php

namespace App\Models;

class Tag extends \Eloquent
{

    protected $table = 'tags';

    public function article()
    {
        return $this->belongsToMany('Article');
    }

}
