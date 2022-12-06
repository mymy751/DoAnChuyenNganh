<?php

namespace App\Respository;

use App\Models\Bill;

class BillRepository extends BaseRepository
{
    public $_model;
    public function __construct(Bill $billModel)
    {
        $this->_model = $billModel;
    }
    public function getBill()
    {
        return $this->_model->get();
    }
}
