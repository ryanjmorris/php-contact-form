<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RouteTest extends TestCase
{
    /**
     * Determines if the basic route is correct.
     *
     * @return void
     */
    public function testIsHomeValidRoute()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * Determines if an unknown route returns correct status code.
     *
     * @return void
     */
    public function testIsInvalidRoute()
    {
        $response = $this->get('/unkownroutehere');

        $response->assertStatus(404);
    }

    /**
     * Ensures that you can't get to /contact by access it but rather is only available via POST
     *
     * @return void
     */
    public function testPostRouteUnavailable()
    {
        $response = $this->get('/contact');

        $response->assertStatus(500);
    }
}
