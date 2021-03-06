<?php

namespace App\Http\Controllers\Admin;

use App\TypeAsset;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TypeAssetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $typeAssets = TypeAsset::all();
        return view('admin.pages.type_asset.index',compact('typeAssets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.type_asset.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $typeAsset = new TypeAsset();
        $typeAsset->name = $request->name;
        $typeAsset->save();
        toastr()->success('đã thêm thành công một loại tài sản');
        return redirect()->route('admin.type-asset.index');
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
        $typeAsset = TypeAsset::find($id);
        return view('admin.pages.type_asset.edit',compact('typeAsset'));

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
        $typeAsset = TypeAsset::find($id);
        $typeAsset->name = $request->name;
        $typeAsset->save();
        toastr()->success('đã sửa thành công một loại tài sản');
        return redirect()->route('admin.type-asset.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $typeAsset = TypeAsset::find($id);
        $typeAsset->delete();
        toastr()->warning('đã xoá một loại tài sản');
        return redirect()->back();
    }
}
