<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Carbon\Carbon;

use App\{Information,User,images,TypeAsset};

class ClientController extends Controller
{
    public function index()
    {
        return view('client.home.index');
    }

    public function listing()
    {
        $data['user'] = User::all();
        $data['images'] = images::all();
        $data['typeasset'] = TypeAsset::all();

        $data['nha_ban'] = Information::where('id_type',1)->paginate(1);

        return view('client.listing.index',$data);
    }

    public function getDetail($slug_listbuy){
        $data['listbuy'] = Information::where("slug",$slug_listbuy)->first();
        return view('client.listing.detail',$data);
    }

    public function listingRent()
    {

        return view('client.listing.listing-rent');
    }

    public function contact()
    {
        return view('client.home.contact');
    }
}
