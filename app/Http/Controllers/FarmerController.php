<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Farmers;
use App\Models\Land;

class FarmerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $employees = DB::table('users')->where(['Role' => 'Farmer'])->get();
        // dd($employees);
        return view('site.Farmer.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('site.Farmer.create');
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
            'land_location_cordinates' =>  'required|max:191',
            'farmer_name'      =>  'required|max:191',
            'farmer_email'     =>  'required|max:191',
            'farmer_address'      =>  'required|max:191',
            'farmer_contact'     =>  'required|max:191'
        ]);

        $emplo = new Land([
            'field_name' => $request->get('field_name'),
            'Land_size' => $request->get('Land_size'),
            'field_unit' => $request->get('field_unit'),
            'land_location_cordinates' => $request->get('land_location_cordinates'),
            'farmer_name' => $request->get('farmer_name'),
            'farmer_email' => $request->get('farmer_email'),
            'farmer_address' => $request->get('farmer_address'),
            'farmer_contact' => $request->get('farmer_contact')
        ]);

        $employee = $request->all();
        // dd( $emplo);
        $emplo->save();

        return $this->responseRedirect('site.Land.index', 'Land details added successfully', 'success', false, false);
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
        $employee = User::findOrFail($id);
        // dd($employee);
        return view('site.Farmer.edit', compact('employee'));
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
        $employee = $request->validate([

            'name'      =>  'required|max:191',
            'email'     =>  'required|max:191',
            'address'      =>  'required|max:191',
            'Phone'     =>  'required|max:191'

        ]);

        unset($employee['_token']);
        // dd($employee);
        
        // $employee = $request->validate([

        //     'field_name'      =>  'required|max:191',
        //     'Land_size'     =>  'required|max:191',
        //     'field_unit'  =>  'required|max:191',
        //     'land_location_cordinates'=>  'required|max:191',
        //     'farmer_name'      =>  'required|max:191',
        //     'farmer_email'     =>  'required|max:191',
        //     'farmer_address'      =>  'required|max:191',
        //     'farmer_contact'     =>  'required|max:191'

        //     ]);
        User::whereId($request->id)->update($employee);
        return $this->index();
        
        // $employees = DB::table('users')->get();
        // dd($employees);
        // return view('site.Farmer.index', compact('employees'));
        // return redirect('/coronas')->with('success', 'Corona Case Data is successfully updated');
        // return $this->responseRedirect('site.Farmer.index', 'Farmer detail updated successfully', 'success', false, false);
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
        $employee = User::findOrFail($id);
        $employee->delete();
        return $this->index();
        // return $this->responseRedirect('site.Farmer.index', 'Farmer Account deleted successfully', 'success', false, false);
    }
}
