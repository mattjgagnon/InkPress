<?php

namespace App\Models;

class Media extends \Eloquent
{

    protected $table = 'media';

    public function articles()
    {
        return $this->hasMany('Article');
    }

}
