<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use DB;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{

    public function create()
    {
        return view('auth.register');
    }

    function randcode($length = 25) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
    $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'join_date' => date('Y-m-d'),
            'join_time' => time(),
            'register_agent' => \Request::header('User-Agent'),
            'register_ip' => \Request::ip(),
            'status' => "1",
        ]);

        event(new Registered($user));

        Auth::login($user);

        User::where('id',  Auth::user()->id)
       ->update([
           'login_agent' => \Request::header('User-Agent'),
           'login_ip' => \Request::ip(),
        ]);

        if(!Auth::user()->status==1)
        {
        Auth::logout();
        return redirect('/login')->with('status-alert', 'User has been blocked by Admin');
        exit();
        }
        else
        {

        }

        //Global Vars
        $logu_id = Auth::user()->id;
        $today_date = date('Y-m-d');

        //refer system
        if (session()->has('referby') AND is_null(Auth::user()->refer_id)) {

        if(is_null(Auth::user()->refer_join_status)){
        $refjoinuser = Auth::user()->id;
        $referby_userP = env('REFER_BY');
        $joining_userP = env('REFER_JOIN');
        $joining_userIP = \Request::ip();
        $joi_agent = \Request::server('HTTP_USER_AGENT');
        $userid = session('referby');
        $userdate = date('Y-m-d');
        $usertime = time();
        $ip = $request->ip();
        DB::statement("UPDATE `users` SET points = points + $referby_userP, total_referral = total_referral + 1 WHERE id = $userid");
        DB::statement("UPDATE `users` SET points = points + $joining_userP, refer_join_status = 1, refer_by = $userid WHERE id = $refjoinuser");

        DB::insert('insert into refer_historys (refer_by, join_user, joining_user_ip, joining_user_points, refer_by_points, joining_user_agent)
                values (?, ?, ?, ?, ?, ?)',
                [$userid, $refjoinuser, $joining_userIP, $joining_userP ,$referby_userP, $joi_agent]);

        DB::insert('insert into trackers (user_id, points, transation, type, time, date, ip)
        values (?, ?, ?, ?, ?, ?, ?)',
        [$userid, $referby_userP, "Referral credit", "1", $usertime, $userdate, $ip]);

        }else{

        }

        }else{

        }
        //ref end

        $myRandomString = $this->randcode(6);

        //create refer random code and update to the table
        if(is_null(Auth::user()->refer_id)){
        $dailymission = DB::table('users')->where('id',$logu_id)->update(
        ['refer_id' => $myRandomString, 'log_date' => $today_date, 'refer_join_status' => 1]
        );
        if($dailymission){
        return redirect()->to('/');
        }else{
        }
        }else{
        return redirect()->to('/');
        }

        return redirect(RouteServiceProvider::HOME);
    }
}
