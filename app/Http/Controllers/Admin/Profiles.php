<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\User;
// use App\Models\Company;
use App\Http\Controllers\BaseController;

use Auth;
use Hash;

class Profiles extends BaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        //      
    }

        
    public function profile(Request $request){
        $user = Auth::user();
        
        return view('site.pages.profiles', compact('user'));
    }

    public function updateuser(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'contact' => 'required',
        ]);
        $user = Auth::user();
        $user->name = $request->get("name");
        $user->email = $request->get("email");
        $user->contact = $request->get("contact");
        $user->Country = $request->get("Country");
         $user->name = $request->get("name");
        $user->City = $request->get("City");

        if($request->has("photo")){
            $photo = request()->file('photo');
            $imageName = time().'.'.$photo->getClientOriginalExtension();
            $photo->move(public_path('images/profile_photos'), $imageName);
            $user->image = 'images/profile_photos/'.$imageName;
        }
        $user->update();
        return back()->with("success", __('page.updated_successfully'));
    }

        public function edituser(Request $request){
        $user = User::find($request->get("id"));
        $validate_array = array(
            'name'=>'required',
            'contact'=>'required',
            'password' => 'confirmed',
        );
        $request->validate($validate_array);
        
        $user->name = $request->get("name");
        $user->email = $request->get("email");
        $user->contact = $request->get("contact");
        $user->Country = $request->get("Country");
         $user->name = $request->get("name");
        $user->City = $request->get("City");


        if($request->get('password') != ''){
            $user->password = Hash::make($request->get('password'));
        }
        $user->save();
        return response()->json('success');
    }

    public function create(Request $request){
        $validate_array = array(
            'name'=>'required|string|unique:users',
            'status'=>'required',
            'contact'=>'required',
            'password'=>'required|string|min:6|confirmed'
        );
        if($request->get('role') == '2' || $request->get('role') == '4'){
            $validate_array['company_id'] = 'required';
        }
        
        $request->validate($validate_array);
        
        User::create([
            'name' => $request->get('name'),
            'contact' => $request->get('phone_number'),
            'admin_id' => $request->get('admin_id'),
            'status' => $request->get('status'),
            'address' => $request->get('address'),
            'password' => Hash::make($request->get('password'))
        ]);
        return response()->json('success');
    }

    public function delete($id){
        $user = User::find($id);
        if(!$user){
            return back()->withErrors(["delete" => __('page.something_went_wrong')]);
        }
        $user->delete();
        return back()->with("success", __('page.deleted_successfully'));
    }

    public function change_user(Request $request){
        $request->validate([
            'password' => 'confirmed',
        ]);
        $user = Auth::user();
        
        if($request->get('password') != ''){
            $user->password = Hash::make($request->get('password'));
        }        
        $user->update();
        return back()->with("success", __('page.updated_successfully'));
    }
     public function profile_pass(Request $request){
        $user = Auth::user();
        
        return view('users.change_password', compact('user'));
    }
}
