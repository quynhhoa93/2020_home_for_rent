<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Information;

class ClientController extends Controller
{
    public function index()
    {
        return view('client.home.index');
    }

    public function listing()
    {
        return view('client.listing.index');
    }

    public function contact()
    {
        return view('client.home.contact');
    }

    // public function search(Request $request)
    // {
    //     $product = Information::where('name','like','%'.$request->key)
    // }
}
