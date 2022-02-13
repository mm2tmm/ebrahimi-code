<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreOrderRequest;
use app\Models\CUrrency;
use app\Models\Wallet;
use app\Models\Order;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
    {
        // validation chacked in StoreOrderRequest

        // variable defining
        $wallet = Wallet::findOrFail($request->wallet_id);
        $currency = CUrrency::findOrFail($request->currency_id);
        $order_volume = $request->order_volume;

        // Calculate the transaction cost
        $cost = $currency->fee * $order_volume / 100;

        // Check the user's wallet balance
        if ($cost > $wallet->balance)
            return response()->json([
                'success' => false,
                'message' => 'Your wallet balance is not enough',
            ]);

        // Reduce cost
        $wallet->balance = $wallet->balance - $cost;
        $wallet->save();


        /* -----------------------------
        ------ start save order -------- */

        $order = new Wallet();

        // Authentication is not considered for now
        $order->user_id = 1;

        // set order data
        $order->currency_id = $currency->id;
        $order->amount = 1;
        $order->fee = 1;

        $order->save();

        /* ------ end save order -------
        -------------------------------- */


        return response()->json($order, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
