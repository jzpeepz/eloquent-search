<?php

namespace Jzpeepz\EloquentSearch\Traits;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Jzpeepz\EloquentSearch\SearchAbstract;

trait Searchable
{
    /**
     * Boot the trait.
     */
    protected static function bootSearchable()
    {
        static::saved(function (Model $model) {
            $model->generateAbstract();
        });

        static::deleting(function (Model $model) {
            $model->removeAbstract();
        });
    }

    public function generateAbstract()
    {
        $type = get_class();

        $abstract = SearchAbstract::where('searchable_id', $this->id)
            ->where('searchable_type', $type)
            ->first();

        if (empty($abstract)) {
            $abstract = SearchAbstract::create([
                'searchable_id' => $this->id,
                'searchable_type' => $type,
            ]);
        }

        $abstract->title = $this->getSearchTitle();

        $abstract->abstract = $this->getSearchAbstract();

        $abstract->save();

        return $abstract;
    }

    public function removeAbstract()
    {
        $type = get_class();

        $abstract = SearchAbstract::where('searchable_id', $this->id)
            ->where('searchable_type', $type)
            ->delete();
    }

    public function search($keywords = null)
    {
        //
    }

    public function getSearchTitle()
    {
        if (!empty($this->searchTitle)) {
            return $this->searchTitle;
        }

        if (!empty($this->title)) {
            return $this->title;
        }

        if (!empty($this->name)) {
            return $this->name;
        }

        return null;
    }

    public function getSearchAbstract()
    {
        if (!empty($this->searchAbstract)) {
            return $this->searchAbstract;
        }

        return strip_tags(implode(' ', array_values($this->attributes)));
    }

    public function getSearchTypeLabel()
    {
        $parts = explode('\\', get_class($this));
        $last = end($parts);
        return Str::of($last)->snake()->replace('_', ' ')->title();
    }

    abstract public function url();

    abstract public function getSearchDescription();
}
