<?php

namespace Tests\Unit;

use App\Http\Controllers\CartController;
use Illuminate\Http\Request;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CartTest extends TestCase
{
    use RefreshDatabase;

    public function testAddProductToCartWhenNotAuthenticated()
    {
        $request = new Request();
        $request->replace(['quantity' => 1]);

        $productId = 1;

        $cartController = new CartController();
        $response = $cartController->add($productId, $request);

        $this->assertEquals(302, $response->getStatusCode()); // 302 is the status code for a redirect
        $this->assertEquals(url('register'), $response->headers->get('Location'));
    }
}