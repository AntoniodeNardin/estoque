<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Laravel\Sanctum\Sanctum;
use App\Models\Usuario;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected Usuario $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = Usuario::factory()->create();
        Sanctum::actingAs($this->user);
    }
}
