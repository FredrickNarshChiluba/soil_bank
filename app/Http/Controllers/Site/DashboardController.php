<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use App\Models\Attribute;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //admin.dashboard.index'
        //  $attributes = Attribute::all();
        // $this->attributeRepository->listAttributes();
        //  $categories=Product::all();
        $employees_vou_ip= DB::table('copoun')->where(['is_used' =>0]);
        // dd($employees_vou_ip); 
        $employees_vou_ips= DB::table('copoun')->where(['is_used' =>1]);
        $employees_vou_ipsd= DB::table('users')->where(['Role' =>1]);
        $employees_vou_ipsdd= DB::table('nutrients');

        $employee = User::all();
         

        return view('site.Dashboard.index',['employees_vou_ip'=>$employees_vou_ip,'employees_vou_ips'=>$employees_vou_ips,'employees_vou_ipsd'=>$employees_vou_ipsd,'employees_vou_ipsdd'=>$employees_vou_ipsdd]);
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
