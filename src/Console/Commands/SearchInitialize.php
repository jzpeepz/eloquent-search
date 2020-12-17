<?php

namespace Jzpeepz\EloquentSearch\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class SearchInitialize extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'search:init {--update}';

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
        $update = $this->option('update');

        $searchables = config('eloquent-search.searchable');

        if (!$update) {
            DB::table('search_abstracts')->truncate();
            $this->line('Initiating search index...');
        } else {
            $this->line('Updating search index...');
        }

        foreach ($searchables as $searchable) {
            $objects = $searchable::all();

            $this->info(get_class($objects->first()));

            $bar = $this->output->createProgressBar($objects->count());
            $bar->start();

            foreach ($objects as $object) {
                $object->generateAbstract();
                $bar->advance();
            }

            $bar->finish();
            $this->line('');
        }

        $this->line('Search index updated!');
    }
}
