<?php

namespace Jzpeepz\EloquentSearch;

use Illuminate\Database\Eloquent\Model;

class SearchAbstract extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * Get all of the owning searchable models.
     */
    public function searchable()
    {
        return $this->morphTo();
    }
}
