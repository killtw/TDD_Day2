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

    /** @test **/
    public function it_should_add_1_episode_one_and_1_episode_two_then_discount_95_percent_and_return_190()
    {
        // arrange
        $target = $this->cart;

        // act
        $expected = 190;
        $actual = $target->add(new Book(1, 100))
            ->add(new Book(2, 100))
            ->checkout();

        // assert
        $this->assertEquals($expected, $actual);
    }

    /** @test **/
    public function it_should_add_1_episode_one_two_and_three_then_discount_90_percent_and_return_270()
    {
        // arrange
        $target = $this->cart;

        // act
        $expected = 270;
        $actual = $target->add(new Book(1, 100))
            ->add(new Book(2, 100))
            ->add(new Book(3, 100))
            ->checkout();

        // assert
        $this->assertEquals($expected, $actual);
    }

    /** @test **/
    public function it_should_add_1_episode_one_two_three_and_four_then_discount_80_percent_and_return_320()
    {
        // arrange
        $target = $this->cart;

        // act
        $expected = 320;
        $actual = $target->add(new Book(1, 100))
            ->add(new Book(2, 100))
            ->add(new Book(3, 100))
            ->add(new Book(4, 100))
            ->checkout();

        // assert
        $this->assertEquals($expected, $actual);
    }

    /** @test **/
    public function it_should_add_1_episode_one_two_three_four_and_five_then_discount_75_percent_and_return_375()
    {
        // arrange
        $target = $this->cart;

        // act
        $expected = 375;
        $actual = $target->add(new Book(1, 100))
            ->add(new Book(2, 100))
            ->add(new Book(3, 100))
            ->add(new Book(4, 100))
            ->add(new Book(5, 100))
            ->checkout();

        // assert
        $this->assertEquals($expected, $actual);
    }

    /** @test **/
    public function it_should_add_1_episode_one_and_two_and_2_episode_three_and_return_370()
    {
        // arrange
        $target = $this->cart;

        // act
        $expected = 370;
        $actual = $target->add(new Book(1, 100))
            ->add(new Book(2, 100))
            ->add(new Book(3, 100))
            ->add(new Book(3, 100))
            ->checkout();

        // assert
        $this->assertEquals($expected, $actual);
    }

    /** @test **/
    public function it_should_add_1_episode_one_and_two_episode_two_and_three_and_return_460()
    {
        // arrange
        $target = $this->cart;

        // act
        $expected = 460;
        $actual = $target->add(new Book(1, 100))
            ->add(new Book(2, 100))
            ->add(new Book(2, 100))
            ->add(new Book(3, 100))
            ->add(new Book(3, 100))
            ->checkout();

        // assert
        $this->assertEquals($expected, $actual);
    }
}
