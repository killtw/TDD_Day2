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
     * @return float
     */
    public function checkout()
    {
        $sum = 0;

        foreach ($this->books as $book) {
            /** @var Book $book */
            $sum += $book->price;
        }

        $count = count($this->books);
        if ($count == 2) {
            $sum *= 0.95;
        } else if ($count == 3) {
            $sum *= 0.9;
        }

        return $sum;
    }
}
