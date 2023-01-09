<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Mail;



class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
            
            $file = $request->hasFile('thumbnail');
            if($file){
                $image_file = $request->file('thumbnail');
                $url = $image_file->store('images');
                // dd($file_path);
                // dd(asset('storage/app/'. $url));
            

                $request->validate([
                    'name' => ['required', 'string', 'max:255'],
                    'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                    'password' => ['required', 'confirmed', Rules\Password::defaults()],
                    'phone' =>['required', 'numeric','digits:10'],
                    'address'=>['required'],
                    // 'PHOTO' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                    // 'PHOTO' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);
                 

                
                // Checking if we have an image
                
                
                
                        
                    $user = User::create([
                        'name' => $request->name,
                        'email' => $request->email,
                        'address'=>$request->address,
                        'Phone'=> $request->phone,
                        'image'=> $image_file,
                        'url'=> $url,
                        'password' => Hash::make($request->password),
                    ]);

                    // Mail::send('emails.successCreated', $user->toArray(),
                    // function ($message){
                    //     $message->to('duteti@mailinator.com', 'Duteti')->subject('Successful Registration');
                    // });
                    
                    new Registered($user);
                    return view('auth.login');



                      // Auth::login($user);
                    // return redirect(RouteServiceProvider::HOME);
            }
                
    }
    
             
    
}
