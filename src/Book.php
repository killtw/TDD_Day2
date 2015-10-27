<?php

namespace App;

class Book
{
    public $id;
    public $price;

    /**
     * Book constructor.
     *
     * @param $id
     * @param $price
     */
    public function __construct($id, $price)
    {
        $this->id = $id;
        $this->price = $price;
    }
}
