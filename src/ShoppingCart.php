<?php

namespace App;

/**
 * Class ShoppingCart
 *
 * @package App
 */
class ShoppingCart
{
    /**
     * @var array
     */
    protected $books;

    /**
     * ShoppingCart constructor.
     */
    public function __construct()
    {
        $this->books = [];
    }

    /**
     * Add books into shopping cart.
     *
     * @param Book $book
     *
     * @return $this
     */
    public function add(Book $book)
    {
        $this->books[] = $book;

        return $this;
    }

    /**
     * Checkout books and sum price.
     *
     * @return int
     */
    public function checkout()
    {
        $sum = 0;

        foreach ($this->books as $book) {
            /** @var Book $book */
            $sum += $book->price;
        }

        return $sum;
    }
}
