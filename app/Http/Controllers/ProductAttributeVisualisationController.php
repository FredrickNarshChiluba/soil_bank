<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductAttributeVisualisationController extends Controller
{
    //
    public function visualisation()
    {
        $products =  DB::table('products')->get();
        $attributes =  DB::table('attributes')->get();

        foreach($products as $product){

foreach($attributes  as $key => $attribute){

if( $attribute->product_id == $product->id){

if( $attribute->status == 1){
    
    
    $complete= DB::table('attributes')->where(['product_id' =>  $attribute->product_id])->where(['status' => 1])->count();
    $incomplete= DB::table('attributes')->where(['product_id' =>  $attribute->product_id])->where(['status' => 0])->count();
    
    $total= DB::table('attributes')->where(['product_id' =>  $attribute->product_id])->where(['status' => 1])->count()+ DB::table('attributes')->where(['product_id' =>  $attribute->product_id])->where(['status' => 0])->count();
    $completed_percentage = ([($complete/$total)*100]);
    $incompleted_percentage = ([($incomplete/$total)*100]);
// dd($attribute);
   
}
else{

    $attribu=  DB::table('attributes')->where(['product_id' =>  $attribute->product_id])->where(['status' => 1])->count();


}


}

}
$name = $product->name;

$Data = array
(
  array
                  (
                    "value" => $completed_percentage,
                    "name" => $product->name." complete",
                  ),
                  array
                  (
                    "value" => $incompleted_percentage,
                    "name" => $product->name." incomplete",
                  ));

// dd($percenatage2);
return view('piechart',['Data' => $Data,'name' => $name,'products'=>$products ]);
// return view('visual',compact('products','attributes'));


}
        

      

       

    }
}
