<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Voucher_request;
use App\Models\User;
use App\Models\Copouns;
use App\Models\Token;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use DateTime;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use DateTimeZone;
use App\Notifications\Copoun;
// use App\Mail\Copoun;
use Notification;
use Illuminate\Support\Facades\Auth;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class Client_Vouncher_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $employees = DB::table('users')->where(['Role' => 0])->get();

        return view('site.Client_vouncher.index', compact('employees'));
    }
    /**
     * the dark side of the sun
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //        
        $employees_vouc = DB::select('select * from tokens');
        $employee = auth()->user()->id;
        $employees_voucs = Copouns::where('user_id', '=', $employee)->get()->count();

        return view('site.Client_vouncher.create', compact('employees_vouc', 'employees_voucs'))->withEmployees_voucs($employees_voucs);
    }

    public function Client_based()
    {
        $employees_vouc = DB::select('select * from tokens');
        return view('site.Dashboard.Client_index', compact('employees_vouc'));
    }

    public function CategoryPrice(Request $request)
    {
        $data = Token::select('PRICE')->where('id', $request->id)->first();
        return response()->json($data);
    }

    public function stores(Request $request)
    {
        $reque = $request->vouncher;
        $user_coupon=Copouns::where(['coupon_id'=>$reque])->get();
        $user_coupon_object=$user_coupon['0'];
        // dd($user_coupon_object->code);
        
        try {
            $sec_key = 'soil_bank_access_coupon';
            JWT::decode($user_coupon_object->code, new Key($sec_key, 'HS256'));

            // dd('its beyound');
            $employees = DB::table('land')->get();
            $employees = DB::select('select * from nutrients');
            $employees_vouc = DB::select('select * from tokens');
            $employee = auth()->user()->id;
            $employees_voucs = Copouns::where('user_id', '=', $employee)->get()->count();
            // dd($employees_vouc); after copoun purchase
            return view('site.Purchase.index1', compact('employees', 'employees_voucs'));
            // ->withEmployees_voucs($employees_voucs);

        } catch (\Throwable $th) {
            //throw $th;
            // update user coupon to exppired then redirect to account without access to soil data
            Copouns::where(['user_id' => auth()->user()->id])->update(['is_used' => 'expired']);
            return redirect()->route('site.Dashboard.Client_index');
        }

        // $employees_vouc = DB::select('select code from copoun where coupon_id= "$reque" ');
        // dd($employees_vouc);
        // $employees_vou = DB::select('select id from copoun where is_used= "1" ');
        // $emp = json_decode(json_encode($employees_vouc, true));
        // $empv = json_decode(json_encode($employees_vou, true));
        // $nutr = new DateTime();
        // $nutrz = $nutr->format('Y-m-d');
        // $nutrzz = 0;

        // $dt = Carbon::now(new DateTimeZone('EAT'));
        // $username = Carbon::now(new DateTimeZone('EAT'));
        // $expiry = $dt->addHour(1);
        // // Carbon::now();
        // $auth = Auth::id();

        // if ($reque = $employees_vouc) {
        //     # code...
        //     $reque1 = $request->vouncher;

        //     $employees_vouc = DB::update('update copoun set usage_start_date=?, is_used=?,expiry_date=?,user_id=? where code=?', [$username, $nutrzz, $expiry, $auth, $reque1]);

        //     $current_time = Carbon::now(new DateTimeZone('EAT'));
        //     //  $employees_voud = Copouns::where('code', $reque1)->get(['expiry_date']); 1 Hour
        //     $employees_voud =  DB::table('copoun')->where('code', $reque1)->first()->expiry_date;
        //     $employees_voudx =  DB::table('copoun')->where('code', $reque1)->first()->period;
        //     // dd($employees_voudx);

        //     // if ($employees_voudx=="1 Hour") {
        //     # code...
        //     if ($employees_voud >= $current_time) {
        //         // dd('its beyound');
        //         $employees = DB::table('land')->get();
        //         $employees = DB::select('select * from nutrients');
        //         $employees_vouc = DB::select('select * from tokens');
        //         $employee = auth()->user()->id;
        //         $employees_voucs = Copouns::where('user_id', '=', $employee)->get()->count();

        //         // dd($employees_vouc); after copoun purchase
        //         return view('site.Purchase.index1', compact('employees', 'employees_voucs'))->withEmployees_voucs($employees_voucs);
        //     } else {
        //         // dd('its beyound');
        //         $employees_vouc = DB::select('select * from tokens');
        //         return view('site.Dashboard.Client_index', compact('employees_vouc'))->with('success', 'the copoun has been used, please make a request');
        //     }

            // } elseif ($employees_voudx=="2 Hour") {
            //     # code...
            //     if ($employees_voud >= $current_time) {
            //         // dd('its beyound');
            //         return view('site.Purchase.index2');
            //     } else {
            //         // dd('its beyound2');
            //         $employees_vouc = DB::select('select * from tokens');
            //                return view('site.Dashboard.Client_index',compact('employees_vouc'));
            //     }

            // }           

            //  dd($employees_voud);

            // dd('present and expiry date updateed');

            // } else {
            //     # code...
            //     dd('notpresent');
        // }
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

        $employee = $request->all();
        // dd($request->PERIODss .' '."Hour");
        // dd($employee);
        $employee = Auth::id();
        $nutrients = new Voucher_request;
        $nutrients->PERIOD = $request->PERIODss . ' ' . "Hour";
        $nutrients->price = $request->vouch_price;
        $nutrients->REASON = $request->reason;
        $nutr = new DateTime();
        $nutrz = $nutr->format('Y-m-d');
        $nutrients->created_date = $nutrz;
        $nutrients->user_id = $employee;
        $nutrients->save();


        $user = auth()->user();
        $users = $user->email;
        $use = $user->address;
        $usec = $user->Phone;
        $userss = $user->name;
        $user = $user->created_at;

        $details = [
            'greeting' => 'Hi E-Soil Data Bank Admin',
            'body' => 'Copoun Request',
            'thanks' => "$userss <br/> $users <br/> $use ,$usec <p>$user</p> humbly request for a copoun of $request->PERIODss hours ",
            'actionText' => "",
            'actionURL' => url('/create')
        ];

        // dd($users,$details);
        // $user =   Notification::to("tamocmpoza@gmail.com")->send(new Copoun($details));
        // $user =   Notification::send(User::first(),new Copoun($details));
        // $user = User::find($employee);
        // $user->notify(new \App\Notifications\TaskComplete($details));

        // dd($user,$details);


        return view('site.Client_vouncher.create')->with('Copoun request successfully sent', 'message', false, false);


        // return back()->with('site.Client_vouncher.create', 'Copoun request successfully' ,'success',false, false);
    }


    public function validate_copoun(Request $request)
    {
        //

    }

    public function m_token(){
        $coupons = DB::select('select * from copoun');
        return view('site.Dashboard.my_token', compact('coupons'));

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
        //
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
