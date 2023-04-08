<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cashier()
    {
        $products = Product::all();
        $carts = Cart::all();
        return view('pages.cashiers.index', compact('products', 'carts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try {
            DB::beginTransaction();
            $carts = Cart::with('product')->get();

            $total = 0;

            foreach ($carts as $cart) {
                $total += (int) $cart->product->price * (int) $cart->amount;
            }


            $cash = $request->input('cash');
            $change = $cash - $total;


            // Generate Invoice Code
            $length = 10;
            $random = "";
            $characters = array_merge(range('A', 'Z'), range('0', '9'));
            $max = count($characters) - 1;
            for ($i = 0; $i < $length; $i++) {
                $rand = mt_rand(0, $max);
                $random .= $characters[$rand];
            }
            $code_invoice = "POS-" . $random;

            $transaction = Transaction::create([
                'user_id' => auth()->user()->id,
                'code_invoice' => $code_invoice,
                'cash' => $cash,
                'change' => $change,
                'grand_total' => $total
            ]);

            foreach ($carts as $cart) {
                $product = Product::where('id', $cart->product_id)->first(['id', 'category_id', 'name', 'image', 'description', 'price', 'stock']);

                TransactionDetail::create([
                    'transaction_id' => $transaction->id,
                    'product' => $product,
                    'qty' => $cart->amount,
                    'price' => $product->price
                ]);

                // Kurangi stok produk
                $current_stock = $product->stock - $cart->amount;
                $product->update([
                    'stock' => $current_stock
                ]);

                // hapus data produk yang di cart
                $cart->delete();
            }

            DB::commit();
            return view('pages.prints.invoice', [
                'data' => Transaction::with('user', 'transaction_details')->findOrFail($transaction->id)
            ]);
            // dd(Transaction::where('id', $transaction->id)->with('transaction_details')->get());
        } catch (\Exception $e) {
            DB::rollBack();
            // dd($e);
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
