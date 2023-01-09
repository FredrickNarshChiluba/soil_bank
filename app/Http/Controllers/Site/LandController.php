<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;
use App\Models\Land;
class LandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $employees = DB::table('land')->get();
        // dd($employees);
        return view('site.Land.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('site.Land.create');
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
        $this->validate($request, [
            'field_name'      =>  'required|max:191',
            'Land_size'     =>  'required|max:191',
            'field_unit'  =>  'required|max:191',
            'land_location_cordinates'=>  'required|max:191',
            'farmer_name'      =>  'required|max:191',
            'farmer_email'     =>  'required|max:191',
            'farmer_address'      =>  'required|max:191',
            'farmer_contact'     =>  'required|max:191'
        ]);

        $emplo = new Land ([
            'field_name' => $request->get('field_name'),
            'Land_size' => $request->get('Land_size'),
            'field_unit' => $request->get('field_unit'),
            'land_location_cordinates' => $request->get('land_location_cordinates'),
            'farmer_name' => $request->get('farmer_name'),
            'farmer_email' => $request->get('farmer_email'),
            'farmer_address' => $request->get('farmer_address')
        ]);

        $employee = $request->all();
        
        $employee->save();


        if (!$brand) {
            return $this->responseRedirectBack('Error occurred while saving Land data.', 'error', true, true);
        }
        return $this->responseRedirect('site.Land.index', 'Land details added successfully' ,'success',false, false);
    
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
        $employee = Land::findOrFail($id);
       return view('site.Land.edit', compact('employee'));
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
            'land_location_cordinates'=>  'required|max:191',
            'farmer_name'      =>  'required|max:191',
            'farmer_email'     =>  'required|max:191',
            'farmer_address'      =>  'required|max:191',
            'farmer_contact'     =>  'required|max:191'
            
            ]);
       Land::whereId($id)->update($employee);

        // return redirect('/coronas')->with('success', 'Corona Case Data is successfully updated');
        return $this->responseRedirect('site.Land.index', 'Land detail updated successfully' ,'success',false, false);
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
        $employee = Land::findOrFail($id);
        $employee->delete();
        return $this->responseRedirect('site.Land.index', 'Land Account deleted successfully' ,'success',false, false);
    
    }
}
