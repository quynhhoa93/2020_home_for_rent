<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\EditInformationPost;
use App\Http\Requests\IndexInformationPost;
use App\Information;
use App\Notifications\AuthorPostInformationApproved;
use App\Tinhthanhpho;
use App\TypeAsset;
use App\Information_image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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
    public function store(IndexInformationPost $request)
    {
//        $data = $request->all();
//        dd($data);
        $information = new Information();
        $information->id_type = $request->type_id;
        $information->user_id = Auth::id();
        $information->name = $request->name;
        $information->city = $request->city;
        $information->address = $request->address;
        $information->description = $request->description;
        $information->price = $request->price;
        $information->status = $request->status;
        $information->slug = str_slug($request->name);
        $information->apartment_type = $request->apartment_type;
        $information->is_approve = 1;

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

//        dd($information);
        $information->save();
        toastr()->success('đã thêm thành công một bài viết');
        return redirect()->route('admin.information.index');
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
        $typeAssets = TypeAsset::all();
        $cities = Tinhthanhpho::all();
        $information = Information::find($id);
        return view('admin.pages.information.edit',compact('information','typeAssets','cities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditInformationPost $request, $id)
    {
        $information = Information::find($id);
        $information->id_type = $request->type_id;
        $information->user_id = Auth::id();
        $information->name = $request->name;
        $information->city = $request->city;
        $information->address = $request->address;
        $information->description = $request->description;
        $information->price = $request->price;
        $information->status = $request->status;
        $information->slug = str_slug($request->name);
        $information->apartment_type = $request->apartment_type;
        $information->is_approve = 1;

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

                $large_image_path = 'backend/img/information/large/';
                $medium_image_path = 'backend/img/information/medium/';
                $small_image_path = 'backend/img/information/small/';

                if (file_exists($small_image_path.$information->image)){
                    unlink($small_image_path.$information->image);
                    unlink($medium_image_path.$information->image);
                    unlink($large_image_path.$information->image);
                }
            }
        } else{
            $filename = $request->current_image;
        }

        $information->image = $filename;
        $information->save();
        toastr()->success('đã sửa thành công bài viết');
        return redirect()->route('admin.information.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $information = Information::find($id);
        $large_image_path = 'backend/img/information/large/';
        $medium_image_path = 'backend/img/information/medium/';
        $small_image_path = 'backend/img/information/small/';

        if (file_exists($small_image_path.$information->image)){
            unlink($small_image_path.$information->image);
            unlink($medium_image_path.$information->image);
            unlink($large_image_path.$information->image);
        }

        $information->delete();
        toastr()->warning('đã xoa thành công một bài viết');
        return redirect()->back();
    }

    public function pending(){
        $informations = Information::where('is_approve',0)->get();
        return view('admin.pages.information.pending',compact('informations'));
    }

    public function approve($id){
        $information = Information::find($id);
        if($information->is_approved == 0){
            $information->is_approve = 1 ;
            $information->save();
            $information->user->notify(new AuthorPostInformationApproved($information));

            toastr()->success('bai dang da duoc cap quyen');
        }else{
            toastr()->info('bai dang chua duoc cap quyen');
        }
        return redirect()->back();
    }

    public function getAddImages($id){
        $informationDetails = Information::find($id);
        $informationImages = Information_image::where(['information_id'=>$id])->get();
        return view('admin.pages.information.add_image',compact('informationDetails','informationImages'));
    }

    public function postAddImages(Request $request){
        $data = $request->all();
        if ($request->hasFile('image')){
            $files = $request->file('image');
            foreach ($files as $file){
                $image = new Information_image();
                $extension = $file->getClientOriginalExtension();
                $file_name = rand(111,9999).'.'.$extension;
                $large_image_path = 'backend/img/information_image/large/' . $file_name;
                $medium_image_path = 'backend/img/information_image/medium/' . $file_name;
                $small_image_path = 'backend/img/information_image/small/' . $file_name;

                Image::make($file)->save($large_image_path);
                Image::make($file)->resize(600, 600)->save($medium_image_path);
                Image::make($file)->resize(300, 300)->save($small_image_path);

                $image->image = $file_name;
                $image->information_id = $data['information_id'];
                $image->save();
            }
        }

        toastr()->success('thêm thành công ảnh chi tiết cho bài viết');
        return redirect()->back();
    }

    public function deleteAltImage($id){
        $informationImage = Information_image::where(['id'=>$id])->first();
        $large_image_path = 'backend/img/information_image/large/';
        $medium_image_path = 'backend/img/information_image/medium/';
        $small_image_path = 'backend/img/information_image/small/' ;

        if (file_exists($large_image_path.$informationImage->image)){
            unlink($large_image_path.$informationImage->image);
            unlink($medium_image_path.$informationImage->image);
            unlink($small_image_path.$informationImage->image);
        }

        $informationImage->delete();
        toastr()->warning('xoá một ảnh chi tiết cho bài viết');
        return redirect()->back();
    }
}
