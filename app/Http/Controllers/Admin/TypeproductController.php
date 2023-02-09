<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Typeproduct;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class TypeproductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $typeproduct = Typeproduct::paginate('10');

        $count = Typeproduct::all()->count();
        return view('admin.typeproduct',['typeproduct'=>$typeproduct,'count'=>$count]);
    }

    public function viewinserttypeproduct()
    {
        return view('admin.inserttypeproduct');
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
        ], [
            'name.required' => 'กรุณากรอกข้อมูล',
        ]);
        try {

            $typeproduct = new Typeproduct;
            $typeproduct->name = $request->input('name');
            $typeproduct->save();
            toast('Insert success','success');
            return view('admin.inserttypeproduct');
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
        $typeproduct = Typeproduct::findOrFail($id);
        return view('admin.edittypeproduct',['typeproduct'=>$typeproduct]);
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
        ], [
            'name.required' => 'กรุณากรอกข้อมูล',
        ]);
        try {

            $typeproduct = Typeproduct::findOrFail($id);

            $typeproduct->update([
                'name' => $request->input('name'),
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
            Typeproduct::destroy($id);

            toast('Delete success','success');
            return redirect()->back();
        } catch (\Throwable $e) {
            report($e);
            Alert::error('กรุณาลองใหม่!');
            return false;
        }
    }
}
