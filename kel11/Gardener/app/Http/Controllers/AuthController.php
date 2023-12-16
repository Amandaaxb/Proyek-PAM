<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('do_logout');
    }
    public function index()
    {
        return view('pages.auth.main');
    }
    public function do_login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|max:255',
            'password' => 'required|min:8',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('username')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('username'),
                ]);
            }else{
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('password'),
                ]);
            }
        }
        if(Auth::attempt(['username' => $request->username, 'password' => $request->password]))
        {
            if(Auth::user()->level == 'gardener'){
                return response()->json([
                    'alert' => 'success',
                    'message' => 'Welcome back '. Auth::user()->name,
                    'callback' => route('user.index'),
                ]);
            }elseif(Auth::user()->level == 'designer'){
                return response()->json([
                    'alert' => 'success',
                    'message' => 'Welcome back '. Auth::user()->name,
                    'callback' => route('user.index'),
                ]);
            }elseif(Auth::user()->level == 'user'){
                return response()->json([
                    'alert' => 'success',
                    'message' => 'Welcome back '. Auth::user()->name,
                    'callback' => route('user.index'),
                ]);
            }else{
                return response()->json([
                    'alert' => 'success',
                    'message' => 'Welcome back '. Auth::user()->name,
                    'callback' => route('user.index'),
                ]);
            }
        }else{
            return response()->json([
                'alert' => 'error',
                'message' => 'Maaf, sepertinya ada beberapa kesalahan yang terdeteksi, silakan coba lagi.',
            ]);
        }
    }
    public function do_logout()
    {
        $user = Auth::user();
        Auth::logout($user);
        return redirect('auth');
    }
}