<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use DataTables;

class AuthController extends Controller


{


    public function test(){
      $data =   DB::select('select * from users where name = "Admin" ' );

    //   dd($data);

    }
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('users')
                ->where('type', 'dealer')
                ->get();
            return Datatables::of($data)->make(true);
        }

        return view('users');
    }

    public function changeinfo_post(Request $request)
    {
                 $id = $request->id;
                 $city = $request->city;
                 $state = $request->state;
                 $zip = $request->zip;

     $data = [
            'city' => $city,
            'state' => $state,
            'zip' => $zip,
        ];
        DB::table('users')->where('id', $id)->update($data);

        return redirect()->route('dashboard.get');

    }
    public function show($id)
    {
        $user = User::find($id);

        if ($user) {
            return response()->json($user);
        } else {
            return response()->json(['error' => 'User not found'], 404);
        }
    }

    public function addinfo_post(Request $request)
    {

        //       $data = $request->all();
        // dd($data);

        $state = $request->stt;
        $city = $request->city;
        $zip = $request->zip;
        $id = $request->id;

        $data = [
            'city' => $city,
            'state' => $state,
            'zip' => $zip,
        ];

        DB::table('users')->where('id', $id)->update($data);

        return redirect()->route('dashboard.get');
    }
    public function logout()
    {
        Auth::logout();
        return view('login');
    }
    public function dashboard()
    {
        if (Auth::check()) {
            $users = DB::table('Product')->get();
            return view('welcome',compact('users'));
        } else {
            return redirect()->route('login.get');
        }
    }

    public function login()
    {
        return view('login');
    }
    public function register()
    {
        return view('register');
    }
    public function login_post(Request $request)
    {



        $data =   $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'type' => 'required',
        ]);



        // $data = $request->all();
        // dd($data);

        if (Auth::attempt($data)) {
            return redirect()->route('dashboard.get');
        } else {
            return redirect()->route('login.get');
        }
    }
    public function register_post(Request $request)
    {
        // $data = $request->all();

        $data =   $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'type' => 'required',

        ]);
        // dd($data);
        if (User::where('email', $data['email'])->exists()) {
            return redirect()->back()->withErrors(['email_already_register' => 'Your email is already registered.'])->withInput();
        }

        $user = User::create($data);

        if ($user) {
            return redirect()->route('login.get');
        }
    }
}
