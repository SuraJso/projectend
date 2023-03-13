<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = Orders::with('order_details')->paginate('10');
        return view('admin.order')->with('order',$order);
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
        //
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
        $order = Orders::where('id', $id)->first();
        if ($request->value == "success") {
            $order->update([
                'status' => 2
            ]);
        } elseif($request->value == "delivery"){
            $order->update([
                'status' => 4
            ]);
        }
        elseif($request->value == "deliverysuccess"){
            $order->update([
                'status' => 5
            ]);
        }
        elseif($request->value == "notpass"){
            $order->update([
                'status' => 3
            ]);
        }
        elseif($request->value == "cancel"){
            $order->update([
                'status' => 6
            ]);
        }
        toast('อัพเดทสถานะเรียบร้อย','success');
        return redirect()->route('adminorder.index');
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
