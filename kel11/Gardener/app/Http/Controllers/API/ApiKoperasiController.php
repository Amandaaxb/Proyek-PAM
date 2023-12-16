<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Koperasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ApiKoperasiController extends Controller
{
    
    
    public function index()
    {
        $koperasi = Koperasi::all();
        // return response()->json($koperasi);
        return response()->json([
            'success' => '1',
            'message' => 'Get Produk Berhasil',
            'barang' => $koperasi
        ]);
    }
    
    
    public function create()
    {
        //
    }

    
    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_barang' => 'required|unique:koperasi',
            'jenis_barang' => 'required',
            'harga_barang' => 'required',
            'stok' => 'required',
            'gambar' => 'required',
        ]);
        
        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('nama_barang')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('nama_barang'),
                ]);
            } elseif ($errors->has('jenis_barang')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('jenis_barang'),
                ]);
            } elseif ($errors->has('harga_barang')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('harga_barang'),
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
        $file = request()->file('gambar')->store('koperasi');
        $koperasi = new Koperasi;
        $koperasi->nama_barang = $request->nama_barang;
        $koperasi->jenis_barang = $request->jenis_barang;
        $koperasi->harga_barang = Str::of($request->harga_barang)->replace('.', '') ?: 0;;
        $koperasi->stok = $request->stok;
        $koperasi->gambar = $file;  
        $koperasi->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'Barang '.$request->nama_barang.' Berhasil Dibuat'
        ]);
    }

    
    
    public function show($id)
    {
        $product = Koperasi::where(['jenis_barang' => $id])->get();
        return response()->json($product);
    }

    
    
    public function edit($id)
    {
        //
    }

    
    
    public function update( Koperasi $datakoperasi, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_barang' => 'required',
            'jenis_barang' => 'required',
            'harga_barang' => 'required',
            'stok' => 'required',
        ]);
        
        // dd($request->all());
        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('nama_barang')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('nama_barang'),
                ]);
            } elseif ($errors->has('jenis_barang')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('jenis_barang'),
                ]);
            } elseif ($errors->has('harga_barang')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('harga_barang'),
                ]);
            } elseif ($errors->has('stok')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('stok'),
                ]);
            }  
        }

        if($request->hasfile('gambar')){
            Storage::delete($datakoperasi->gambar);
            $file = request()->file('gambar')->store('koperasi');
            $datakoperasi->nama_barang = $request->nama_barang;
            $datakoperasi->jenis_barang = $request->jenis_barang;
            $datakoperasi->harga_barang = Str::of($request->harga_barang)->replace('.', '') ?: 0;;
            $datakoperasi->stok = $request->stok;
            $datakoperasi->gambar = $file;
            $datakoperasi->update();
        }else{        
            $datakoperasi->nama_barang = $request->nama_barang;
            $datakoperasi->jenis_barang = $request->jenis_barang;
            $datakoperasi->harga_barang = Str::of($request->harga_barang)->replace('.', '') ?: 0;;
            $datakoperasi->stok = $request->stok;
            $datakoperasi->update();
        }
        
        return response()->json([
            'alert' => 'success',
            'message' => 'Product '. $datakoperasi->nama_barang . ' berhasil diubah',
        ]);
    }

    public function destroy(Koperasi $datakoperasi)
    {
        Storage::delete($datakoperasi->gambar);
        $datakoperasi->delete();
        return response()->json([
            'alert'=>'success',
            'message'=>'Data '.$datakoperasi->name_product.' berhasil dihapus'
        ]);
    }
}