<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\Land;
use App\Models\Nutrients;
use App\Models\Token;
use App\Models\Copouns;

class SoilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $employees = DB::table('soil')->get();
        // dd($employees);
        return view('site.Soil.index', compact('employees'));
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
        $soil_data = $request->all();
        // removing _token key and value
        unset($soil_data['_token']);
        Nutrients::whereId($soil_data['id'])->update($soil_data);

        $employees = DB::table('nutrients')->get();
        // dd($employees);
        return view('site.Land.index', compact('employees'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function Client_soil($id)
    {
        //
        $employee = Nutrients::findOrFail($id);
        $employee_user = auth()->user()->id;
        $employees_vouc = Copouns::where('user_id', '=', $employee)->get();
        $employees_voucs = Copouns::where('user_id', '=', $employee_user)->get()->count();
        return view('site.Soil.Client_soil', compact('employee', 'employees_voucs'));
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
        $employee = Nutrients::findOrFail($id);
        return view('site.Soil.edit', compact('employee'));
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
        $employee = $request->validate([

            'field_name'      =>  'required|max:191',
            'Land_size'     =>  'required|max:191',
            'field_unit'  =>  'required|max:191',
            'land_location_cordinates' =>  'required|max:191',
            'farmer_name'      =>  'required|max:191',
            'farmer_email'     =>  'required|max:191',
            'farmer_address'      =>  'required|max:191',
            'farmer_contact'     =>  'required|max:191'

        ]);
        Land::whereId($id)->update($employee);

        // return redirect('/coronas')->with('success', 'Corona Case Data is successfully updated');
        return $this->responseRedirect('site.Soil.index', 'soil sample detail updated successfully', 'success', false, false);
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
