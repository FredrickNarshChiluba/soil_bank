<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\BaseController;

use Illuminate\Http\Request;
use App\Models\User;
use App\Traits\UploadTrait;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends BaseController
{
        use UploadTrait;
    

    public function index()
    {
        $this->setPageTitle('Employees', 'Employee List');
        $employee = User::all();
        return view('site.Employees.index', compact('employee'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->setPageTitle('Employees', 'Create Employee Account');
        return view('site.Employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response 
     */
    public function store(Request $request)
    {
        //  $employee =$request->validate([
        //     'name'          =>  'required |max:191',
        //     'email' =>  'required |max:191',
        //     'password'          =>  'required |max:191'
        //        // 'image'        => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);
        $request->validate([
            'name'          =>  'required |max:191',
            'email' =>  'required |max:191',
            'password'   =>  'required |max:191',
            'Role'=>  'required |max:191'
        ]);
        $employee = $request->all();

        dd($employee);



         $emplo = new User ([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            // 'password' => $request->get('password'),
            
            'password' => Hash::make($request['password']),
            // 'country' => $request->get('country')
        ]);
        dd($employee);
        $image = $request->file('image');
            // Make a image name based on user name and current timestamp
            $name = $request->input('name').'_'.time();
            // Define folder pathUser
            $folder = '/uploads/images/';
            // Make a file path where image will be stored [ folder path + file name + file extension]
            // $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
            // Upload image
            // $this->uploadOne($image, $folder, 'public', $name);
            // Set user profile image path in database to filePath
            // $emplo->image = $filePath;

             $emplo->save();
              return $this->responseRedirect('site.Employees.index', 'Account created successfully' ,'success',false, false);
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
         $employee = User::findOrFail($id);
         $this->setPageTitle('Employee', 'Edit Employee');
        return view('site.Employees.edit', compact('employee'));
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

             'name'          =>  'required |max:191',
            'email' =>  'required |max:191',
            'password'          =>  'required |max:191',
               'image'        => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            
            ]);
       Employee::whereId($id)->update($employee);

        // return redirect('/coronas')->with('success', 'Corona Case Data is successfully updated');
        return $this->responseRedirect('site.Employees.index', 'Employee updated successfully' ,'success',false, false);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = User::findOrFail($id);
        $employee->delete();
        return $this->responseRedirect('site.Employees.index', 'Employee Account deleted successfully' ,'success',false, false);
    }
}
