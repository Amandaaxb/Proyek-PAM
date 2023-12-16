<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Koperasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class KoperasiController extends Controller
{
    
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $keywords = $request->keywords;
            $collection = Koperasi::where('nama_barang','like','%'.$keywords.'%')
            ->paginate(10);
            return view('pages.user.koperasi.list',compact('collection'));
        }
        return view('pages.user.koperasi.main');
    }

    
    public function create()
    {
        return view('pages.user.koperasi.input',['koperasi'=>new Koperasi]);
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
        $koperasi->kode_barang = $request->kode_barang;
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
        //
    }

    
    public function edit(Koperasi $koperasi)
    {
        return view('pages.user.koperasi.input', compact('koperasi'));
    }

    
    public function update(Request $request, Koperasi $koperasi)
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
            Storage::delete($koperasi->gambar);
            $file = request()->file('gambar')->store('koperasi');
            $koperasi->kode_barang = $request->kode_barang;
            $koperasi->nama_barang = $request->nama_barang;
            $koperasi->jenis_barang = $request->jenis_barang;
            $koperasi->harga_barang = Str::of($request->harga_barang)->replace('.', '') ?: 0;;
            $koperasi->stok = $request->stok;
            $koperasi->gambar = $file;
            $koperasi->update();
        }else{        
            $koperasi->nama_barang = $request->nama_barang;
            $koperasi->kode_barang = $request->kode_barang;
            $koperasi->jenis_barang = $request->jenis_barang;
            $koperasi->harga_barang = Str::of($request->harga_barang)->replace('.', '') ?: 0;;
            $koperasi->stok = $request->stok;
            $koperasi->update();
        }
        
        return response()->json([
            'alert' => 'success',
            'message' => 'Product '. $koperasi->nama_barang . ' berhasil diubah',
        ]);
    }

    
    public function destroy(Koperasi $koperasi)
    {
        Storage::delete($koperasi->gambar);
        $koperasi->delete();
        return response()->json([
            'alert'=>'success',
            'message'=>'Data '.$koperasi->nama_barang.' berhasil dihapus'
        ]);
    }
}