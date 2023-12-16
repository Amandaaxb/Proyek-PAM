<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Pulsa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ApiPulsaController extends Controller
{
    
    public function index()
    {
        $pulsa = Pulsa::all();
        // return response()->json($pulsa);
        return response()->json([
            'success' => '1',
            'message' => 'Get Produk Berhasil',
            'pulsa' => $pulsa
        ]);
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_pulsa' => 'required|unique:pulsa',
            'jenis_pulsa' => 'required',
            'harga_pulsa' => 'required',
            'stok' => 'required',
            'gambar' => 'required',
        ]);
        
        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('nama_pulsa')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('nama_pulsa'),
                ]);
            } elseif ($errors->has('jenis_pulsa')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('jenis_pulsa'),
                ]);
            } elseif ($errors->has('harga_pulsa')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('harga_pulsa'),
                ]);
            } elseif ($errors->has('stok')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('stok'),
                ]);
            } else if ($errors->has('gambar')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('gambar'),
                ]);
            } 
        }
        $file = request()->file('gambar')->store('pulsa');
        $pulsa = new Pulsa;
        $pulsa->nama_pulsa = $request->nama_pulsa;
        $pulsa->jenis_pulsa = $request->jenis_pulsa;
        $pulsa->harga_pulsa = Str::of($request->harga_pulsa)->replace('.', '') ?: 0;;
        $pulsa->stok = $request->stok;
        $pulsa->gambar = $file;  
        $pulsa->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'Barang '.$request->nama_pulsa.' Berhasil Dibuat'
        ]);
    }

    
    public function show($id)
    {
        $product = Pulsa::where(['jenis_pulsa' => $id])->get();
        return response()->json($product);
    }

    
    public function edit(Pulsa $datapulsa)
    {
        
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy(Pulsa $pulsa)
    {
        Storage::delete($pulsa->gambar);
        $pulsa->delete();
        return response()->json([
            'alert'=>'success',
            'message'=>'Data '.$pulsa->nama_pulsa.' berhasil dihapus'
        ]);
    }
}