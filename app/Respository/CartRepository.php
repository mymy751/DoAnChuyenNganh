<?php

namespace App\Respository;

use App\Models\Cart;

class CartRepository extends BaseRepository
{
    public $_model;
    public function __construct(Cart $cartModel)
    {
        $this->_model = $cartModel;
    }

    public function getCart()
    {
        return $this->_model->get();
    }
}
