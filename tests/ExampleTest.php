<?php

namespace Jzpeepz\EloquentSearch\Tests;

use Orchestra\Testbench\TestCase;
use Jzpeepz\EloquentSearch\EloquentSearchServiceProvider;

class ExampleTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [EloquentSearchServiceProvider::class];
    }
    
    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}
