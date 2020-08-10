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
    //     // echo ('tuan le');
    //     // dd($request->all());die;
    //     // $request->validate([
    //     //     ''
    //     // ])
    //     // $product = Information::where('name','like','%'.$request->keyword.'%') ->and('apartment_type',$request->apartment_type)
    //     //                         // ->AND('address',$request->location)
    //     //                         ->get();
    //     // echo $product;die;
    //     // return view('client.listing.search', compact('product'));
    // }
}
