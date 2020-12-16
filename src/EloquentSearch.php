<?php

namespace Jzpeepz\EloquentSearch;

class EloquentSearch
{
    public static function find($search)
    {
        return SearchAbstract::whereRaw('MATCH (title, abstract) AGAINST (?)', [$search])->get();
    }
}
