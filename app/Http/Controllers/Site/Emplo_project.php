<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BaseController;
use App\Contracts\AttributeContract;
use App\Models\Product;
use App\Models\User;
use App\Models\Attribute;
use App\Models\Category;
use Auth;
use Illuminate\Support\Facades\DB;

class Emplo_project extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
    {
        $employee = Auth::user()->id;
        // $attributes = Attribute::find( $id)->with('products');
         $attributes = Attribute::all();

         $data = DB::select('select * from attributes');
        
         $categories=Product::all();
         
         $Category=Category::all();
         // dd($data);

         // $attributes=Attribute::select('attributes.name','attributes.id')->get();
         // leftjoin('products','attributes.product_id' ,'=', 'products.id')->get();

        $this->setPageTitle('Attributes', 'List of all attributes');
        return view('Site.pages.product', compact('attributes','categories','employee','Category'));
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
