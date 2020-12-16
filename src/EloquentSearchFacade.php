<?php

namespace Jzpeepz\EloquentSearch;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Jzpeepz\EloquentSearch\Skeleton\SkeletonClass
 */
class EloquentSearchFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'eloquent-search';
    }
}
