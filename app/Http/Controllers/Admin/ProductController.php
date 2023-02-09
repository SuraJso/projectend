<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Typeproduct;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('typeproduct')->paginate('10');
        $count = Product::all()->count();
        return view('admin.product',['products'=>$products,'count'=>$count]);
    }

    public function viewinsertproduct()
    {

        $typeproduct = Typeproduct::all();
        return view('admin.insertproduct',['typeproduct'=>$typeproduct]);
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
        $this->validate($request, [
            'name' => 'required|string',
            'price' => 'required|integer',
        ], [
            'name.required' => 'กรุณากรอกข้อมูล',
            'price.required' => 'กรุณากรอกข้อมูล',
            'price.integer'  => 'กรุณากรอกเป็นตัวเลขเท่านั้น',
        ]);
        try {

            if($request->file('image')){
                $file= $request->file('image');
                $filename= date('YmdHi').$file->getClientOriginalName();
                $file-> move(public_path('public/product/img'), $filename);
                $data['image']= $filename;
            } else {
                $data['image']= 'noimg.png';
            }
            $product = new Product;
            $product->name = $request->input('name');
            $product->price = $request->input('price');
            $product->img = $data['image'];
            $product->typeproductid = $request->input('typeproduct');
            $product->detail = $request->input('detail');
            $product->save();
            toast('Insert success','success');
            return redirect()->back();
        } catch (\Throwable $e) {
            report($e);
            Alert::error('กรุณากรอกข้อมูลใหม่!');
            return false;
        }
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
        $product = Product::findOrFail($id);

        $typeproduct = Typeproduct::all();
        return view('admin.editproduct',['product'=>$product,'typeproduct'=>$typeproduct]);
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
        $this->validate($request, [
            'name' => 'required|string',
            'price' => 'required|integer',
        ], [
            'name.required' => 'กรุณากรอกข้อมูล',
            'price.required' => 'กรุณากรอกข้อมูล',
            'price.integer'  => 'กรุณากรอกเป็นตัวเลขเท่านั้น',
        ]);
        try {
            $product = Product::findOrFail($id);

            if($request->file('image')){

                $file= $request->file('image');
                $filename= date('YmdHi').$file->getClientOriginalName();
                $file-> move(public_path('public/product/img'), $filename);
                $data['image']= $filename;


            } else {
                $data['image']= $product->img;
            }

            $product->update([
                'name' => $request->input('name'),
                'price' => $request->input('price'),
                'img' => $data['image'],
                'typeproductid' => $request->input('typeproduct'),
                'detail' => $request->input('detail'),
            ]);

            toast('Update success','success');
            return redirect()->back();
        } catch (\Throwable $e) {
            report($e);
            Alert::error('กรุณากรอกข้อมูลใหม่!');
            return false;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Product::destroy($id);

            toast('Delete success','success');
            return redirect()->back();
        } catch (\Throwable $e) {
            report($e);
            Alert::error('กรุณาลองใหม่!');
            return false;
        }
    }
}
