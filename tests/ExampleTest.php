<?php

namespace Mr687\Wamazing\Tests;

use Orchestra\Testbench\TestCase;
use Mr687\Wamazing\WamazingServiceProvider;

class ExampleTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [WamazingServiceProvider::class];
    }
    
    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}
