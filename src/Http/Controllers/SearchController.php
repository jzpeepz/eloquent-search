<?php

namespace Jzpeepz\EloquentSearch\Http\Controllers;

use Illuminate\Routing\Controller;
use Jzpeepz\EloquentSearch\EloquentSearch;

class SearchController extends Controller
{
    public function index()
    {
        $search = request()->input('q');

        $results = EloquentSearch::find($search);

        return view('eloquent-search::index', compact('results'));
    }
}
