<?php

namespace Tests\Unit;

use App\Http\Controllers\UsersController;
use Illuminate\Http\Request;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UsersTest extends TestCase
{
    use RefreshDatabase;

    public function testOrderIndexWhenNotAuthenticated()
    {
        $request = new Request();

        $usersController = new UsersController();
        $response = $usersController->orderIndex($request);

        $this->assertEquals(302, $response->getStatusCode()); // 302 is the status code for a redirect
        $this->assertEquals(url('/'), $response->headers->get('Location'));
    }
}
