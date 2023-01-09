<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Token;
use App\Models\Copouns;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Response;


class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $employees = DB::table('users')->where(['Role' => 0])->get();
        // dd($employees);
        return view('site.Clients.index', compact('employees'));
    }



    public function Client_based(){
       
        $employees = DB::select('select * from nutrients');
        $employees_vouc = DB::select('select * from tokens');
        $employee = auth()->user()->id;
        $employees_voucs=Copouns::where('user_id','=',$employee)->get()->count();
        
        // dd($employees_vouc); after copoun purchase
        return view('site.Purchase.index1', compact('employees','employees_voucs'))->withEmployees_voucs($employees_voucs);
                // return view('site.Dashboard.Client_index_vouncher', compact('employees','employees_voucs'))->withEmployees_voucs($employees_voucs);

    }

    public function Client_baseds(Request $request){
        //
        $selc = $request->input('selc');
        
        // $employees_vouc = DB::select('select * from tokens where id:id',['id',$selc]);
        $employees_vouc=Token::where('id','=',$selc)->get();
        // $employees_vouc=DB::table('tokens')->where('id',$selc);
        // $employees_vouc=DB::table('tokens')->where('id','=',$selc)->get();
     
        // // dd('hello');
        return Response::json($employees_vouc);
        
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function tokens()
    {
        //
        
        $employees = DB::table('tokens')->get();
        // dd($employees);
        return view('site.Token.index', compact('employees'));
    }
    public function create()
    {
        //
        return view('site.Token.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $employee = auth()->user()->id;
        $employeea=$request->all(); 
        // dd($employeea);       
        $nutrients = new Token;
        $nutrients->PERIOD=$request->PERIOD;
        $nutrients->CATEGORY=$request->CATEGORY;
        $nutrients->PRICE=$request->PRICE;        
        $nutrients->user_id=$employee;
        $nutrients->save();
        return view('site.Token.create')->with('message','Token category request successfully' ,false, false);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $employee = auth()->user()->id;
        $employees_vouc=Copouns::where('user_id','=',$employee)->get();
        $employees_voucs=Copouns::where('user_id','=',$employee)->get()->count();
        // dd($employees_voucs);
        return view('site.Purchase.index2', compact('employees_vouc','employees_voucs'))->withEmployees_voucs($employees_voucs);
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
