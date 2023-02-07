<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Admin;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\Copouns;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

use DateTime;
use Carbon\Carbon;
use DateTimeZone;
use PhpParser\Node\Stmt\TryCatch;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        // return redirect()->intended(RouteServiceProvider::HOME);
        $input = $request->all();

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->user()->Role == 'Admin' || auth()->user()->Role == 'Super Admin' || auth()->user()->Role == 'Data Entrant' || auth()->user()->Role == 'Technician') {
            return redirect()->route('Dashboard');
        } elseif (auth()->user()->Role == 'Farmer') {
            // dd("farmer");
            $employees = DB::table('land')->get();
            $employees = DB::select('select * from nutrients');
            $employees_vouc = DB::select('select * from tokens');
            $employee = auth()->user()->id;
            $employees_voucs = Copouns::where('user_id', '=', $employee)->get()->count();
            // dd($employees_vouc); after copoun purchase
            // Copouns::where(['user_id' => auth()->user()->id])->update(['is_used' => '1']);
            return view('site.Purchase.index4', compact('employees', 'employees_voucs'));
        } else {

            // dd($request->email);
            // return redirect()->route('site.Dashboard.Client_index');

            $employees_voucopo = DB::select("select * from copoun where is_used!='expired'");
            if (count($employees_voucopo) > 0) {
                foreach ($employees_voucopo as $values) {
                    if ($values->user_id == auth()->user()->id) {
                        try {
                            $sec_key = 'soil_bank_access_coupon';
                            JWT::decode($values->code, new Key($sec_key, 'HS256'));

                            // dd('its beyound');
                            $employees = DB::table('land')->get();
                            $employees = DB::select('select * from nutrients');
                            $employees_vouc = DB::select('select * from tokens');
                            $employee = auth()->user()->id;
                            $employees_voucs = Copouns::where('user_id', '=', $employee)->get()->count();
                            // dd($employees_vouc); after copoun purchase
                            // Copouns::where(['user_id' => auth()->user()->id])->update(['is_used' => '1']);
                            return view('site.Purchase.index1', compact('employees', 'employees_voucs'));
                            // ->withEmployees_voucs($employees_voucs);

                        } catch (\Throwable $th) {
                            //throw $th;
                            // update user coupon to exppired then redirect to account without access to soil data
                            Copouns::where(['user_id' => auth()->user()->id])->update(['is_used' => 'expired']);
                            return redirect()->route('site.Dashboard.Client_index');
                        }

                        // $current_time = Carbon::now(new DateTimeZone('EAT'));
                        // $employees_voud =  DB::table('copoun')->where('user_id', auth()->user()->id)->first()->expiry_date;
                        // if ($employees_voud >= $current_time) {
                        //     // dd('its beyound');
                        //     $employees = DB::table('land')->get();
                        //     $employees = DB::select('select * from nutrients');
                        //     $employees_vouc = DB::select('select * from tokens');
                        //     $employee = auth()->user()->id;
                        //     $employees_voucs = Copouns::where('user_id', '=', $employee)->get()->count();

                        //     // dd($employees_vouc); after copoun purchase
                        //     return view('site.Purchase.index1', compact('employees', 'employees_voucs'));
                        //     // ->withEmployees_voucs($employees_voucs);
                        // } else {
                        //     return redirect()->route('site.Dashboard.Client_index');
                        // }

                    }
                }
                // no user coupon found
                return redirect()->route('site.Dashboard.Client_index');
            } else {
                return redirect()->route('site.Dashboard.Client_index');
            }
        }
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
