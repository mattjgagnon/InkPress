<?php

namespace App\Models;

class Article extends \Eloquent
{

    protected $table = 'articles';

    public function author()
    {
        return $this->belongsTo('User');
    }

    public function media()
    {
        return $this->belongsTo('Media');
    }

    public function tag()
    {
        return $this->belongsToMany('App\Models\Tag')->withTimestamps();
    }

}
