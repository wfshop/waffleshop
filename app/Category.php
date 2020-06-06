<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * A category may has many waffles.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function waffles()
    {
        return $this->morphedByMany(Waffle::class, 'categorizable');
    }
}
