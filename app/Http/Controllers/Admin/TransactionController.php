<?php

namespace App\Http\Controllers\Admin;

use App\Models\Cart;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\TransactionDetail;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Transaksi;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaksi::all();

        return view('admin.transactions.index', compact('transactions'));
    }
    public function store(Request $request)
    {
        $params = $request->all();

        $transactionParams = [
            'name' => $params['name'],
            'address' => $params['address'],
            'resep' => $params['resep'],
            'right_size' => $params['right_size'],
            'right_type' => $params['right_type'],
            'left_size' => $params['left_size'],
            'left_type' => $params['left_type'],
            'merk' => $params['merek'],
            'type' => $params['tipe'],
            'harga' => $params['harga'],
            'diskon' => $params['diskon'],
            'total' => $params['total'],
            'vascout' => $params['vascout']
        ];

        $transaction = Transaksi::create($transactionParams);

        if ($transaction) {
            return redirect()->route('admin.transactions.show', $transaction->id)->with([
                'message' => 'Success order',
                'alert-type' => 'success'
            ]);
        }
    }


    public function show(Transaksi $transaction)
    {

        return view('admin.transactions.show', compact('transaction'));
    }



    public function destroy(Transaction $transaction)
    {

        $transaction->delete();

        return redirect()->back()->with([
            'message' => 'success delete',
            'alert-type' => 'danger'
        ]);
    }

    public function print_struck(Transaksi $transaction)
    {

        return view('admin.transactions.nota', compact('transaction'));
    }
}
