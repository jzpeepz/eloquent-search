<?php

namespace Jzpeepz\EloquentSearch\Console\Commands;

use Illuminate\Console\Command;

class SearchInitialize extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'search:init';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Initialize search abstracts for all searchable models';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $searchables = config('eloquent-search.searchable');

        foreach ($searchables as $searchable) {
            $objects = $searchable::all();

            foreach ($objects as $object) {
                $object->generateAbstract();
            }
        }
    }
}
