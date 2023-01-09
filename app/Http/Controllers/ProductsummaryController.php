<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class ProductsummaryController extends Controller
{
    //
  public function summary()
  {
    $products =  DB::table('products')->get();
    $attributes =  DB::table('attributes')->get();


    return view('admin.metric.summary',['attributes' => $attributes,'products'=>$products ]);

  }

  public function piechart($id){
   $products =  DB::table('products')->get();
   $attributes =  DB::table('attributes')->get();
   $product = DB::table('products')->where('id','=',$id)->pluck('name');
   $name = $product[0];
// dd($product[0]);
   $complete= DB::table('attributes')->where(['product_id' =>  $id])->where(['status' => 1])->count();
   $incomplete= DB::table('attributes')->where(['product_id' =>  $id])->where(['status' => 0])->count();

   $total= DB::table('attributes')->where(['product_id' => $id])->where(['status' => 1])->count()+ DB::table('attributes')->where(['product_id' =>  $id])->where(['status' => 0])->count();
   $completed_percentage = ([($complete/$total)*100]);
   $incompleted_percentage = ([($incomplete/$total)*100]);
   $Data = array
   (
    array
    (
      "value" => $completed_percentage,
      "name" => $name. " complete",
    ),
    array
    (
      "value" => $incompleted_percentage,
      "name" => $name." incomplete",
    ));

// dd($Data);
   return view('chart',['Data' => $Data,'product' => $product,'name'=>$name,'attributes' => $attributes,'products'=>$products]);
 }
}