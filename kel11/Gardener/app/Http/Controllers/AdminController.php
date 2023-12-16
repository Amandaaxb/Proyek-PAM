<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware(function ($request,$next) {
            $level = Auth::user()->level;
            if($level != '1'){
                abort(403);
            }
            return $next($request);
        });
    }
    
    public function index()
    {
        return view('pages.admin.dashboard.main');
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
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