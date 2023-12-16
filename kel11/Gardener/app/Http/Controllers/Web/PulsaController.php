<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Pulsa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class PulsaController extends Controller
{
    
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $keywords = $request->keywords;
            $collection = Pulsa::where('nama_pulsa','like','%'.$keywords.'%')
            ->paginate(10);
            return view('pages.user.pulsa.list',compact('collection'));
        }
        return view('pages.user.pulsa.main');
    }

    
    public function create()
    {
        return view('pages.user.pulsa.input',['datapulsa'=>new Pulsa]);
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
        $pulsa->kode_pulsa = $request->kode_pulsa;
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
        //
    }

    
    public function edit(Pulsa $datapulsa)
    {
        return view('pages.user.pulsa.input', compact('datapulsa'));
    }

    
    public function update(Request $request, Pulsa $datapulsa)
    {
        $validator = Validator::make($request->all(), [
            'nama_pulsa' => 'required',
            'jenis_pulsa' => 'required',
            'harga_pulsa' => 'required',
            'stok' => 'required',
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

        if($request->hasfile('gambar')){
            Storage::delete($datapulsa->gambar);
            $file = request()->file('gambar')->store('pulsa');
            $datapulsa->kode_pulsa = $request->kode_pulsa;
            $datapulsa->nama_pulsa = $request->nama_pulsa;
            $datapulsa->jenis_pulsa = $request->jenis_pulsa;
            $datapulsa->harga_pulsa = Str::of($request->harga_pulsa)->replace('.', '') ?: 0;;
            $datapulsa->stok = $request->stok;
            $datapulsa->gambar = $file;  
            $datapulsa->update();
        }else{        
            $datapulsa->nama_pulsa = $request->nama_pulsa;
            $datapulsa->kode_pulsa = $request->kode_pulsa;
            $datapulsa->jenis_pulsa = $request->jenis_pulsa;
            $datapulsa->harga_pulsa = Str::of($request->harga_pulsa)->replace('.', '') ?: 0;;
            $datapulsa->stok = $request->stok;
            $datapulsa->update();
        }
        
        return response()->json([
            'alert' => 'success',
            'message' => 'Product '. $datapulsa->nama_pulsa . ' berhasil diubah',
        ]);
        
    }

    
    public function destroy(Pulsa $datapulsa)
    {
        Storage::delete($datapulsa->gambar);
        $datapulsa->delete();
        return response()->json([
            'alert'=>'success',
            'message'=>'Data '.$datapulsa->nama_pulsa.' berhasil dihapus'
        ]);
    }
}