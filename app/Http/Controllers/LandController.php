<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\Land;
use App\Models\Nutrients;
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
        $employees = DB::table('nutrients')->get();
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
        // $nutrients = new Land;
        // $nutrients->Organic_Carbons=$request->Organic_Carbons;
        // $nutrients->Organic_Carbon=$request->Organic_Carbon;

        // $nutrients->Nitrogens=$request->Nitrogens;
        // $nutrients->Nitrogen=$request->Nitrogen;

        // $nutrients->Phosphoruss=$request->Phosphoruss;
        // $nutrients->Phosphorus=$request->Phosphorus;

        // $nutrients->Potassiums=$request->Potassiums;
        // $nutrients->Potassium=$request->Potassium;

        // $nutrients->Cation_Exchange_Capacitys=$request->Cation_Exchange_Capacitys;
        // $nutrients->Cation_Exchange_Capacity=$request->Cation_Exchange_Capacity;

        // $nutrients->field_name=$request->field_name;
        // $nutrients->Land_size=$request->Land_size;
        
        // $nutrients->field_unit=$request->field_unit;
        // $nutrients->land_location_cordinates=$request->land_location_cordinates;
        // $nutrients->farmer_name=$request->farmer_name;
        // $nutrients->farmer_email=$request->farmer_email;
        // $nutrients->farmer_address=$request->farmer_address;
        // $nutrients->farmer_contact=$request->farmer_contact;


        // dd($request->all());
        // $request->validate([
        // 'Soil_type' =>  'required|max:191',
        // 'Soil_texture' =>  'required|max:191',
        // 'Organic_Carbons' =>  'required|max:191',
        // 'Organic_Carbon' =>  'required|max:191',
        // 'Soil_phps' =>  'max:191',
        // 'Soil_php' =>  'max:191',

        // 'Nitrogens'=>  'required|max:191',
        // 'Nitrogen'=>  'required|max:191',

        // 'Phosphoruss'=>  'required|max:191',
        // 'Phosphorus'=>  'required|max:191',

        // 'Potassiums'=>  'required|max:191',
        // 'Potassium'=>  'required|max:191',

        // 'Cation_Exchange_Capacitys'=>  'required|max:191',
        // 'Cation_Exchange_Capacity'=>  'required|max:191',

        //     'field_name'      =>  'required|max:191',
        //     'Land_size'     =>  'required|max:191',
        //     'field_unit'  =>  'required|max:191',
        //     'land_location_cordinates'=>  'required|max:191',
        //     'farmer_name'      =>  'required|max:191',
        //     'farmer_email'     =>  'required|max:191',
        //     'farmer_address'      =>  'required|max:191',
        //     'farmer_contact'     =>  'required|digits:10'
        // ]);

        $employee = $request->all();
        // dd($employee);
        // $emplo =Land::create($employee);
        $emplo =Nutrients::create($employee);

        if (!$emplo) {
            return $this->responseRedirectBack('Error occurred while storing Land details.', 'error', true, true);
        }
        return back()->with('site.Land.index', 'Land details added successfully' ,'success');

       

        // $employee = $request->all();
        // dd($emplo);
        // $emplo->save();
        // $employee = $request->all();
        // // dd( $emplo);
        // $employ->save();
       
        // return view('site.Land.index', 'Land details added successfully' ,'success',false, false);
    
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
        $employee = Nutrients::findOrFail($id);
        // dd($employee);
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
            'land_location_district'=>  'required|max:191',
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
        // dd($id);
        $employee = Nutrients::findOrFail($id);
        $employee->delete();
        return $this->index();
    
    }
}
