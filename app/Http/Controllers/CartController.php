<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\Ordersdetails;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = Orders::where('userid', Auth::id())->where('status', 0)->first();
        return view('cart')->with('order', $order);
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
        $product = Product::find($request->product_id);
        $order = Orders::where('userid', Auth::id())->where('status', 0)->first();

        if ($order) {
            $orderDetail = $order->order_details()->where('productid', $product->id)->first();
            if ($orderDetail) {
                $amountNew = $orderDetail->amount + 1;
                $orderDetail->update([
                    'amount' => $amountNew
                ]);
            } else {
                $prepareCartDetail = [
                    'orderid' => $order->id,
                    'productid' => $product->id,
                    'amount' => 1,
                    'price' => $product->price,
                ];
                $orderDetail = Ordersdetails::create($prepareCartDetail);
            }
        } else {
            $prepareCart = [
                'status' => 0,
                'userid' => Auth::id()
            ];



            $order = Orders::create($prepareCart);


            $prepareCartDetail = [
                'orderid' => $order->id,
                'productid' => $product->id,
                'amount' => 1,
                'price' => $product->price,
            ];
            $orderDetail = Ordersdetails::create($prepareCartDetail);
        }

        $totalRaw = 0;
        $total = $order->order_details->map(function ($orderDetail) use ($totalRaw) {
            // totalRaw = totalRaw +  $orderDetail->amount * $orderDetail->price;
            $totalRaw += $orderDetail->amount * $orderDetail->price;
            return $totalRaw;
        })->toarray();

        $order->update([
            'total' => array_sum($total)
        ]);
        return redirect()->route('category');
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Orders $order)
    {
        $orderDetail = $order->order_details()->where('productid', $request->product_id)->first();
        if ($request->value == "checkout") {
            $order->update([
                'status' => 1
            ]);
        } else {
            if ($orderDetail) {
                if ($request->value == "increase") {
                    $amountNew = $orderDetail->amount + 1;
                    $orderDetail->update([
                        'amount' => $amountNew
                    ]);
                }
                else
                {
                    if ($orderDetail->amount <= 1) {
                        $orderDetail->delete();
                    } else {
                        $amountNew = $orderDetail->amount - 1;
                        $orderDetail->update([
                            'amount' => $amountNew
                        ]);
                    }
                }
            }


            $totalRaw = 0;
            $total = $order->order_details->map(function ($orderDetail) use ($totalRaw) {
                // totalRaw = totalRaw +  $orderDetail->amount * $orderDetail->price;
                $totalRaw += $orderDetail->amount * $orderDetail->price;
                return $totalRaw;
            })->toarray();

            $order->update([
                'total' => array_sum($total)
            ]);
        }
        return redirect()->route('home1');
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
