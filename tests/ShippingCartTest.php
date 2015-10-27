<?php

use App\Book;
use App\ShoppingCart;

class ShippingCartTest extends PHPUnit_Framework_TestCase
{
    protected $cart;

    public function setUp()
    {
        $this->cart = new ShoppingCart();
    }

    public function tearDown()
    {
        $this->cart = null;
    }

    /** @test **/
    public function it_should_add_1_episode_one_and_return_100()
    {
        // arrange
        $target = $this->cart;

        // act
        $expected = 100;
        $actual = $target->add(new Book(1, 100))
            ->checkout();

        // assert
        $this->assertEquals($expected, $actual);
    }
}
