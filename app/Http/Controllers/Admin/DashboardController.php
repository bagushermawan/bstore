<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;
use App\Transaction;

class DashboardController extends Controller
{
    public function index()
    {
        $customer = User::count();
        $revenue = Transaction::sum('total_price'); //where('transaction_status','SUCCESS')->sum
        $transaction = Transaction::count();

        return view('pages.admin.dashboard',[
            'customer' => $customer,
            'revenue' => $revenue,
            'transaction' => $transaction
        ]);
    }
}
