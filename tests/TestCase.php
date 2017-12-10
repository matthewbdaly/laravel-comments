<?php

namespace Tests;

use Orchestra\Testbench\TestCase as BaseTestCase;
use Mockery as m;

class TestCase extends BaseTestCase
{
	protected function getPackageProviders($app)
	{
		return ['Matthewbdaly\LaravelComments\Providers\CommentServiceProvider'];
    }

    public function setUp()
    {
        parent::setUp();
        $this->artisan('migrate', ['--database' => 'sqlite']);
        $this->loadLaravelMigrations(['--database' => 'sqlite']);
        $this->withFactories(__DIR__.'/factories');
    }

    public function tearDown()
    {
        m::close();
        parent::tearDown();
    }
}
