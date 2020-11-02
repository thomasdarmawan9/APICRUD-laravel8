<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\customerData;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer = CustomerData::all();
        return response()->json($customer);
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
        $customer = customerData::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'no_tlp' => $request->no_tlp,
        ]);

        if($customer){
            return response()->json([
                'success' => true,
                'data' => $customer
            ], 400);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'data failed to record'
            ], 400);
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
        $check = CustomerData::firstWhere('id', $id);
        if (!$check) {
            return response()->json([
                'success' => false,
                'message' => 'data not found '
            ], 400);
        }

        $data = CustomerData::select('nama','email')->where('id', $id)->get();
        return response()->json([
            'success' => true,
            'data' => $data
        ], 400);
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
        $customer = CustomerData::whereId($id)->update($request->all());
        $check = CustomerData::firstWhere('id', $id);
        if($customer){
            return response()->json([
                'success' => true,
                'data' => $check
            ], 200);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'data failed to update'
            ], 400);
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
        $customer = CustomerData::whereId($id)->delete();

        if($customer){
            return response()->json([
                'success' => true,
                'message' => 'data deleted'
            ], 200);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'data failed to delete'
            ], 400);
        }
    }
}
