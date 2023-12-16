<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ApiCustomerController extends Controller
{
    public function index()
    {
        $user = User::all();
        return response()->json($user);
    }

    
    public function create()
    {
        
    }

    
    public function store(Request $request)
    {
        
    }

    
    public function show($id)
    {
        
    }

    
    public function edit($id)
    {
        //
    }

    public function do_login(Request $request){
        $user = User::where('email', $request->email)->first();
        if($user){
            if(password_verify($request->password, $user->password)){
                $user = User::where('email', $request->email)->first();
                return response()->json([
                    'success' => 1,
                    'message' => 'Selamat Datang '.$user->nama_lengkap,
                    'nama_lengkap' => $user->nama_lengkap,
                    'nomor_hp' => $user->nomor_hp,
                    'email' => $request->email,
                ]);
            }
            return $this->error('Password Salah');
            
        }
        return $this->error('Email Tidak Terdaftar');
    }
    
    public function error($pesan){
        return response()->json([
            'success' => 0,
            'message' => $pesan
        ]);
    }

    public function do_register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nomor_ktp' => 'required|unique:users',
            'nama_lengkap' => 'required',
            'nomor_hp' => 'required',
            'username' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
        ]);
        
        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('nomor_ktp')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('nomor_ktp'),
                ]);
            } elseif ($errors->has('nama_lengkap')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('nama_lengkap'),
                ]);
            } elseif ($errors->has('nomor_hp')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('nomor_hp'),
                ]);
            } elseif ($errors->has('username')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('username'),
                ]);
            } else if ($errors->has('password')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('password'),
                ]);
            } elseif ($errors->has('level')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('level'),
                ]);
            } elseif ($errors->has('email')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('email'),
                ]);
            }
        }

        $user = new User;
        $user->nomor_ktp = $request->nomor_ktp;
        $user->nama_lengkap = $request->nama_lengkap;
        $user->nomor_hp = $request->nomor_hp;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->level = '2';
        $user->password = Hash::make($request->password);
        $user->save();
        return response()->json([
            'success' => '1',
            'message' => 'Akun '.$request->username.' Berhasil Terdaftar',
        ]);
    }
    
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }
}