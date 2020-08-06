<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
}
