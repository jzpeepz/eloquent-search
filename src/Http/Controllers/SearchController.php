<?php

namespace Jzpeepz\EloquentSearch\Http\Controllers;

use Illuminate\Routing\Controller;
use Jzpeepz\EloquentSearch\EloquentSearch;

class SearchController extends Controller
{
    public function index()
    {
        $search = request()->input('q');

        $results = EloquentSearch::find($search)
            ->paginate(10)
            ->withQueryString();

        if (function_exists('mimic')) {
            mimic('Search');
        }

        return view('eloquent-search::index', compact('results'));
    }
}
