<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit(User $user)
    {   
        $user = Auth::user();
        // dd($user->id );
        return view('users.edit', array('user'=>Auth::user()))->with('popup', 'open');
    }

    public function update(User $user)
    { 
        if(Auth::user()->email == request('email')) {
        
        $this->validate(request(), [
                'name' => 'required',
              //  'email' => 'required|email|unique:users',
                'password' => 'required|min:6|confirmed'
            ]);

            $fileName = 'profile-'.time().'.'.$file->getClientOriginalExtension();
            // Save the file
            $PHOTO_url = $file->store('images', $fileName);

            $filename = 'profile-'.time().'.'.$request->PHOTO->getClientOriginalExtension();
            $request->PHOTO->move(public_path('images'), $filename);
        
            $user = Auth::user();
            $user->url = $filename;
            $user->name = request('name');
            $user->email = request('email');
            $user->address = request('address');
            $user->Phone = request('Contact');
            dd($user);
           // $user->email = request('email');
            // $user->password = bcrypt(request('password'));
            $user->save();
            return back();
            
        }
        else{
            
        $this->validate(request(), [
                'name' => 'required',
                //'email' => 'required|email|unique:users',
                'email' => 'email|required|unique:users,email,'.$this->segment(2),
                'password' => 'required|min:6|confirmed'
            ]);

            $user->name = request('name');
            $user->email = request('email');
            $user->password = bcrypt(request('password'));

            $user->save();

            return back();  
            
        }
    }

    public function getUser($id){
        $user = User::findOrFail($id);
        return $user;
    }
}
