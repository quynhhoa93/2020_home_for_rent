@extends('admin.layouts.master')
@section('title')
    tạo bài viết mới
@endsection

@push('css')
@endpush

@section('content')
    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Form elements</a> <a href="#" class="current">Validation</a> </div>
            <h1>Form validation</h1>
        </div>
        <div class="container-fluid"><hr>
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                            <h5>Form validation</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <form class="form-horizontal" method="post" action="{{route('author.information.update',$information->id)}}" name="basic_validate" id="basic_validate" novalidate="novalidate" enctype="multipart/form-data">
                            <form class="form-horizontal" method="post" action="{{route('author.information.update',$information->id)}}" name="basic_validate" id="basic_validate" novalidate="novalidate" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="control-group">
                                    <label class="control-label">loại tài sản</label>
                                    <div class="controls">
                                        <select name="type_id">
                                            @foreach($typeAssets as $typeAsset)
                                                <option value="{{$typeAsset->id}}" @if($information->id_type == $typeAsset->id)selected @endif>{{$typeAsset->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">tên bài viết</label>
                                    <div class="controls">
                                        <input type="text" name="name" id="required" value="{{$information->name}}">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">thành phố</label>
                                    <div class="controls">
                                        <select name="city">
                                            <option value="0">chon thanh pho</option>
                                            @foreach($cities as $city)
                                                <option value="{{$city->name}}" @if($information->city == $city->name)selected @endif>{{$city->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">địa chỉ chi tiết</label>
                                    <div class="controls">
                                        <input type="text" name="address" id="required" value="{{$information->address}}">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">chi tiết bài viết</label>
                                    <div class="controls">
                                        <textarea type="text" name="description" id="summary-ckeditor">{!! $information->description !!}</textarea>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">ảnh bài viết </label>
                                    <div class="control">
                                        <input style="margin: 0 22px;" type="file" name="image">
                                        <input type="hidden" name="current_image" value="{{$information->image}}">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">giá mong muốn</label>
                                    <div class="controls">
                                        <input type="number" name="price" id="required" value="{{$information->price}}">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">trạng thái</label>
                                    <div class="controls">
                                        <select name="status" >
                                            <option value="0" @if($information->status == 0)selected @endif>ẩn</option>
                                            <option value="1" @if($information->status == 1)selected @endif>hiện</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">loai nha</label>
                                    <div class="controls">
                                        <select name="apartment_type">
                                            <option value="villa" @if($information->apartment_type == 'villa')selected @endif>villa</option>
                                            <option value="house" @if($information->apartment_type == 'house')selected @endif>house</option>
                                            <option value="condo" @if($information->apartment_type == 'condo')selected @endif>condo</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <button type="submit" value="Validate" class="btn btn-success">lưu</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('js')
@endpush