<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CobaController extends Controller
{
    public function index()
    {
    $friends = Friends::paginate(3);

    return view('index' , compact('friends'));
    }
    public function create()
    {
    return view('create');
    }
    public function store(request, $request)
    {
        //validate the request...
        $friends = new Friends;
        $friends->nama = $request->nama;
        $friends->no_tlp = $request->no_tlp;
        $friends->alamat = $request->alamat;
        
        $friends->save();
    }
}
