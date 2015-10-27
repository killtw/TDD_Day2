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
        
        $grouped = $this->group($this->books);

        foreach ($grouped as $books) {
            $groupSum = 0;

            foreach ($books as $book) {
                /** @var Book $book */
                $groupSum += $book->price;
            }

            $groupSum *= $this->getDiscountRate($books);
            $sum += $groupSum;
        }

        return $sum;
    }

    /**
     * Calculate discount rate.
     *
     * @param $books
     *
     * @return float|int
     */
    private function getDiscountRate($books)
    {
        switch (count($books)) {
            case 2:
                return 0.95;
            case 3:
                return 0.9;
            case 4:
                return 0.8;
            case 5:
                return 0.75;
            default:
                return 1;
        }
    }

    private function group($books)
    {
        $tmp = [];
        $grouped = [];

        foreach ($books as $book) {
            $tmp[$book->id][] = $book;
        }

        foreach ($tmp as $episodes) {
            foreach($episodes as $key => $episode) {
                $grouped[$key][] = $episode;
            }
        }

        return $grouped;
    }
}
