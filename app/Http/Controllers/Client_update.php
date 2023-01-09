<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Copouns;
use Input;

class Client_update extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit(User $user)
    {   
        $user = Auth::user();
        $employee = auth()->user()->id;
        $employees_voucs=Copouns::where('user_id','=',$employee)->get()->count();
                
        // dd($user->id );
        return view('users.index', array('user'=>Auth::user()))->with('employees_voucs')->withEmployees_voucs($employees_voucs);
    }

    public function update(Request $request,User $user)
    { 
        
            if ($request->PHOTO !='') {
            //     $file=$request->file('PHOTO');
            // $fileName = 'profile-'.time().'.'.$file->getClientOriginalExtension();
            // // Save the file
            // dd( $fileName);
            // $PHOTO_url = $file->store('images', $fileName);

            // $filename = 'profile-'.time().'.'.$request->PHOTO->getClientOriginalExtension();
            // $request->PHOTO->move(public_path('images'), $filename);
        
            $user = Auth::user();
            // $user->url = $filename;
            $user->name = request('name');
            $user->email = request('email');
            $user->address = request('address');
            $user->Phone = request('Contact');
            // dd($user);
           // $user->email = request('email');
            // $user->password = bcrypt(request('password'));
            $user->save();
            return back();
            } else {
                // dd($request->all());
            // $fileName = 'profile-'.time().'.'.$file->getClientOriginalExtension();
            // // Save the file
            // $PHOTO_url = $file->store('images', $fileName);

            // $filename = 'profile-'.time().'.'.$request->PHOTO->getClientOriginalExtension();
            // $request->PHOTO->move(public_path('images'), $filename);
        
            $user = Auth::user();
            // $user->url = $filename;
            $user->name = request('name');
            $user->email = request('email');
            $user->address = request('address');
            $user->Phone = request('Contact');
            // dd($user);
           // $user->email = request('email');
            // $user->password = bcrypt(request('password'));
            $user->save();
            return back();
            }
            
            
      
        }
}
