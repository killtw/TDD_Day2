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

        $discount = $this->getDiscountRate();
        $sum *= $discount;

        return $sum;
    }

    /**
     * Calculate discount rate.
     *
     * @return float|int
     */
    private function getDiscountRate()
    {
        switch (count($this->books)) {
            case 2:
                return 0.95;
            case 3:
                return 0.9;
            case 4:
                return 0.8;
            default:
                return 1;
        }
    }
}
