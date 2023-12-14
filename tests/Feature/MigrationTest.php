<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Contracts\Console\Kernel;
use Tests\CreatesApplication;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MigrationTest extends TestCase
{
    use CreatesApplication, RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->app = $this->createApplication();
        $this->app->make(Kernel::class)->bootstrap();

        Artisan::call('migrate:fresh');
        Artisan::call('db:seed');
    }

    public function testMigrations()
    {
        // Define your test logic here
        $this->assertTrue(true);
    }
}
