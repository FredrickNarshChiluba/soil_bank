<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\View;

// random string generator  
use Illuminate\Support\Str;




use App\Models\User;
use App\Models\Copouns;
use App\Models\Token;
use App\Models\Voucher_request;
use App\Http\Controllers\AppConstants;
use App\Http\Controllers\CopounGenerator;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

use App\Notifications\Copoun;
// use App\Mail\Copoun;
use Illuminate\Support\Facades\Notification;

class VouncherController extends Controller
{

    public function index()
    {
        $usedLicenses = Copouns::all();
        return view('site.Vouncher.index', compact('usedLicenses'));
        // return View::make('site.Vouncher.index',['usedLicenses'=>$usedLicenses]);
    }

    public function getAvailableLicenses()
    {
        $usedLicenses = Copouns::all();
        $serials  = Serial::where('is_used', '!=', 1)->get();
        return View::make('site.Vouncher.create', ['serials' => $usedLicenses]);
    }

    public function Client_baseds(Request $request)
    {
        //
        $selc = $request->input('selc');
        $employees_vouc = Voucher_request::where('user_id', '=', $selc)->get();

        return Response::json($employees_vouc);
    }

    public function create()
    {
        $serials  = Voucher_request::where('is_used', '!=', 0)->get();
        $employees_user = DB::table('users')->where(['Role' => 1])->get();
        $employees_vouc = DB::select('select * from voucher_requests');
        $usedLicenses = Token::all();

        $category = DB::table('tokens')->get();
        $client_reques = DB::table('voucher_requests')->where(['is_used' => 1])->get();

        return view('site.Vouncher.create', compact('employees_user', 'serials', 'category', 'client_reques', 'employees_vouc', 'usedLicenses'));
    }

    public function store(Request $request)
    {
        /*
        UNDER DEVELOPMENT
        */
        $data = $request->all();
        $userID = $request->clients;
        $license_period = $request->license_period;
        // $user_id = User::where(['name' => $request->input('clients')])->first()->id;
        // // dd($user_id);
        // $client_request = DB::table('voucher_requests')->where(['is_used' => 1])->get();
        $rules = array(
            'license_period' => 'required',
            'clients' => 'required'
        );

        $validator = Validator::make($data, $rules);
        // $validator = $request->validate([$data, $rules]);

        if ($validator->fails()) {
            return Redirect::back()->with(['error' => 'Please Select all fields']);
        } else {

            // $serials = Copouns::where('is_used', '!=', 1)->get();
            // $licensePeriod = $request->license_period;
            // dd(AppConstants::TWO_YEAR_LICENSE);
            $sec_key = 'soil_bank_access_coupon';
            $payload = [
                "iss" => "localhost",
                "iat" => time(),
                "nbf" => time(),
                "exp" => time() + (3600 * intval($license_period)),
                "aud" => "customer",
                "data" => $data
            ];

            $coupon = JWT::encode($payload, $sec_key, 'HS256');
            $coupon_identifier = Str::random(30);
            $this->storeCDKey($coupon, $license_period, $userID, $coupon_identifier);
            return Redirect::back()->with(['success' => 'Coupon is Generated Successfully ']);


            // if ($licensePeriod == AppConstants::ONE_YEAR_LICENSE) {
            //     // $CD_key =  CopounGenerator::getOneYearLicense();
            //     $tokens = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';

            //     $segment_chars = 5;
            //     $num_segments = 5;
            //     $key_string = '';

            //     for ($i = 0; $i < $num_segments; $i++) {

            //         $segment = '';

            //         for ($j = 0; $j < $segment_chars; $j++) {
            //             $segment .= $tokens[rand(0, 35)];
            //         }

            //         $key_string .= $segment;

            //         if ($i < ($num_segments - 1)) {
            //             $key_string .= '-';
            //         }
            //     }
            //     $key_period = substr($key_string, 2, 27);
            //     $oneYear    = '11';
            //     $oneYearLicense = $oneYear . $key_period;
            //     // dd( $oneYearLicense); 
            //     $this->storeCDKey($oneYearLicense, $licensePeriod, $user_id);
            //     return Redirect::back()->with(['success' => 'Coupon is Generated Successfully']);
            // } elseif ($licensePeriod == AppConstants::TWO_YEAR_LICENSE) {
            //     $CD_key = CopounGenerator::getTwoYearLicense();
            //     // dd( $CD_key);
            //     $this->storeCDKey($CD_key, $licensePeriod, $user_id);
            //     return Redirect::back()->with(['success' => 'Coupon is Generated Successfully ']);
            // } elseif ($licensePeriod == AppConstants::THREE_YEAR_LICENSE) {
            //     $CD_key =  CopounGenerator::getThreeYearLicense();
            //     // dd( $CD_key);
            //     $this->storeCDKey($CD_key, $licensePeriod, $user_id);
            //     return Redirect::back()->with(['success' => 'Coupon is Generated Successfully ']);
            // }
        }
    }

    public function storeCDKey($CDkey, $periodOfLicense, $user_id, $coupon_identifier)
    {
        // if ($periodOfLicense == AppConstants::ONE_YEAR_LICENSE) {
        //     $serial = new Copouns();
        //     $serial->user_id = $user_id;
        //     $serial->code = $CDkey;
        //     $serial->period = $periodOfLicense;
        //     $serial->total_days = $periodOfLicense;
        //     $serial->expiry_date = date('Y-m-d', strtotime('+1 years'));
        //     $serial->usage_start_date = date('Y-m-d');
        //     $serial->save();
        // }

        // if ($periodOfLicense == AppConstants::TWO_YEAR_LICENSE) {
        //     $serial = new Copouns();
        //     $serial->user_id = $user_id;
        //     $serial->code = $CDkey;
        //     $serial->period = $periodOfLicense;
        //     $serial->total_days = $periodOfLicense;
        //     $serial->expiry_date = date('Y-m-d', strtotime('+2 years'));
        //     $serial->usage_start_date = date('Y-m-d');
        //     $serial->save();
        // }

        $sec_key = 'soil_bank_access_coupon';
        $decorded_data = JWT::decode($CDkey, new Key($sec_key, 'HS256'));

        $serial = new Copouns();
        $serial->user_id = $user_id;
        $serial->code = $CDkey;
        $serial->coupon_id=$coupon_identifier;
        $serial->period = $periodOfLicense . "Hrs";
        $serial->total_days = $periodOfLicense . "Hrs";
        $serial->expiry_date = date("Y-m-d H:i:s", $decorded_data->exp);
        $serial->usage_start_date = date("Y-m-d H:i:s");
        $serial->save();

        // update request table
        Voucher_request::where(['user_id' => $user_id])->update(['Is_served' => 1]);

        $employees = User::where(['id' => $user_id])->get();



        foreach ($employees as $employee) {

            $name = $employee->name;
            $email = $employee->email;
            // $email="tumusiimet777@gmail.com";
        }

        $details = [
            'greeting' => "Hello Mr/Miss $name ",
            'body' => 'copoun Response',
            'thanks' => " Attached $coupon_identifier  is your  copoun code,thanks for choosing our services ",
            'actionText' => " please fill it into the form provided on the link below",
            'actionURL' => url('client_vouncher/create')
        ];

        // dd($details ,$email);
        // $user =   Notification::send($email,new Copoun($details));

        // send mail
        // Notification::route('mail', $email)->notify(new Copoun($details));

        // return Redirect::back()->with(['success' => 'Copoun is Generated Successfully', 'serials' => $serial]);
    }
}
