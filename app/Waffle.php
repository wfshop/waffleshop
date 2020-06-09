<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Waffle extends Model
{
    protected $guarded = [];

    /**
     * A waffle is belongs to a baker/user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function baker()
    {
        return $this->belongsTo(User::class, 'baker_id');
    }

    public function categories()
    {
        return $this->morphToMany(Category::class, 'categorizable');
    }

    /**
     * Categorize the waffle into one/multiple categories.
     *
     * @param Category|Category[] $categories
     * @return $this
     */
    public function categorize($categories)
    {
        $categories = collect(Arr::wrap($categories))
            ->flatten();

        $this->categories()->saveMany($categories);

        return $this;
    }
}
