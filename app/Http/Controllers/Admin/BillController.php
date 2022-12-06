<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Respository\BillRepository;

class BillController extends Controller
{
    public $_billRepo;
    public function __construct (BillRepository $billRepo)
    {
        $this->_billRepo = $billRepo;
    }
    public function index(){
        $bills = $this->_billRepo->getBill();
        return view('admin.pages.bill.index', compact('bills'));
    }
}
