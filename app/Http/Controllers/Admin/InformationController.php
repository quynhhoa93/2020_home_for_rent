<?php

namespace App\Http\Controllers\Admin;

use App\Information;
use App\Tinhthanhpho;
use App\TypeAsset;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Intervention\Image\ImageManagerStatic as Image;

class InformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $informations = Information::all();
        return view('admin.pages.information.index',compact('informations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $typeAssets = TypeAsset::all();
        $cities = Tinhthanhpho::all();
        return view('admin.pages.information.create',compact('typeAssets','cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $data = $request->all();
//        dd($data);
        $information = new Information();
        $information->id_type = $request->type_id;
        $information->name = $request->name;
        $information->city = $request->city;
        $information->address = $request->address;
        $information->description = $request->description;
        $information->price = $request->price;
        $information->status = $request->status;
        $information->slug = str_slug($request->name);
        $information->apartment_type = $request->apartment_type;
        $information->is_approved = 1;

        //upload image
        if ($request->hasFile('image')) {
            $image_tmp = Input::file('image');
            if ($image_tmp->isValid()) {
                $extension = $image_tmp->getClientOriginalExtension();
                $filename = rand(111, 99999) . '.' . $extension;
                $large_image_path = 'backend/img/information/large/' . $filename;
                $medium_image_path = 'backend/img/information/medium/' . $filename;
                $small_image_path = 'backend/img/information/small/' . $filename;

                //resize image
                Image::make($image_tmp)->save($large_image_path);
                Image::make($image_tmp)->resize(600, 600)->save($medium_image_path);
                Image::make($image_tmp)->resize(300, 300)->save($small_image_path);

                //store image name in product table
                $information->image = $filename;
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
