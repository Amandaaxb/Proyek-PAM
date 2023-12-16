<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Ruangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ApiRuanganController extends Controller
{
    
    public function index()
    {
        $pulsa = Ruangan::all();
        return response()->json($pulsa);
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_ruangan' => 'required',
            'nomor_ruangan' => 'required|unique:ruangan',
            'status_ruangan' => 'required',
            'dipakai' => 'required',
            'selesai' => 'required',
        ]);
        
        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('nama_ruangan')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('nama_ruangan'),
                ]);
            } elseif ($errors->has('nomor_ruangan')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('nomor_ruangan'),
                ]);
            } elseif ($errors->has('status_ruangan')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('status_ruangan'),
                ]);
            } elseif ($errors->has('dipakai')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('dipakai'),
                ]);
            } else if ($errors->has('selesai')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('selesai'),
                ]);
            } 
        }
        $ruangan = new Ruangan;
        $ruangan->nama_ruangan = $request->nama_ruangan;
        $ruangan->nomor_ruangan = $request->nomor_ruangan;
        $ruangan->status_ruangan = $request->status_ruangan;
        $ruangan->dipakai = $request->dipakai;
        $ruangan->selesai = $request->selesai;
        $ruangan->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'Ruangan '.$request->nomor_ruangan.' Berhasil Dibuat'
        ]);
    }

    
    public function show($id)
    {
        $product = Ruangan::where(['nama_ruangan' => $id])->get();
        return response()->json($product);
    }

    
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, Ruangan $ruangan)
    {
        $validator = Validator::make($request->all(), [
            'nama_ruangan' => 'required',
            'nomor_ruangan' => 'required',
            'status_ruangan' => 'required',
            'dipakai' => 'required',
            'selesai' => 'required',
        ]);
        
        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('nama_ruangan')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('nama_ruangan'),
                ]);
            } elseif ($errors->has('nomor_ruangan')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('nomor_ruangan'),
                ]);
            } elseif ($errors->has('status_ruangan')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('status_ruangan'),
                ]);
            } elseif ($errors->has('dipakai')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('dipakai'),
                ]);
            } else if ($errors->has('selesai')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('selesai'),
                ]);
            } 
        }
        $ruangan = new Ruangan;
        $ruangan->nama_ruangan = $request->nama_ruangan;
        $ruangan->nomor_ruangan = $request->nomor_ruangan;
        $ruangan->status_ruangan = $request->status_ruangan;
        $ruangan->dipakai = $request->dipakai;
        $ruangan->selesai = $request->selesai;
        $ruangan->update();
        return response()->json([
            'alert' => 'success',
            'message' => 'Ruangan '.$request->nomor_ruangan.' Berhasil DiUpdate',
        ]);
    }

    
    public function destroy($id)
    {
        //
    }
}