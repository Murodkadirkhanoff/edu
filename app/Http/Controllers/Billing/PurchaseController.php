<?php

namespace App\Http\Controllers\Billing;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Services\Billing\PaymeService;
use Illuminate\Http\Request;


class PurchaseController extends Controller
{
    public function purchaseHistory()
    {
        $transactions = Transaction::where('user_id', auth()->id())->get();
        return view('pages.dashboard.purchase_history', compact('transactions'));
    }
}
