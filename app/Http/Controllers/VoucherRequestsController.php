<?php

namespace App\Http\Controllers;

use App\Models\Voucher_request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VoucherRequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //    $this->setPageTitle('Employees', 'List of all Employees');
        $voucher_requests = DB::table('voucher_requests')->get();
        return view('site.voucher_requests.index', compact('voucher_requests'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $requests = Voucher_request::findOrFail($id);
        //  $this->setPageTitle('Employee', 'Edit Employee');
        return view('site.voucher_requests.edit', compact('requests'));
    }
    /**
    
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $requests = $request->validate([

            'user_id'      =>  'required',
            'created_date'     =>  'required|date_format:Y-m-d|after_or_equal:1920-01-01',
            'PERIOD'  =>  'required|max:191',
            'price' =>  'required|max:191',
            'REASON'      =>  'required|max:191',


        ]);
        // dd($requests);
        Voucher_request::whereId($request->id)->update($requests);

        // return redirect('/coronas')->with('success', 'Corona Case Data is successfully updated');
        // return $this->responseRedirect('site.voucher_requests.index', 'Request updated successfully', 'success', false, false);
        return $this->index();
    }
}
