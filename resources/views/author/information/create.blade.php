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
                            <form class="form-horizontal" method="post" action="{{route('author.information.store')}}" name="basic_validate" id="basic_validate" novalidate="novalidate" enctype="multipart/form-data">
                                @csrf
                                <div class="control-group">
                                    <label class="control-label">loại tài sản</label>
                                    <div class="controls">
                                        <select name="type_id">
                                            @foreach($typeAssets as $typeAsset)
                                                <option value="{{$typeAsset->id}}">{{$typeAsset->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">tên bài viết</label>
                                    <div class="controls">
                                        <input type="text" name="name" id="required">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">thành phố</label>
                                    <div class="controls">
                                        <select name="city">
                                            <option value="0">chon thanh pho</option>
                                            @foreach($cities as $city)
                                                <option value="{{$city->name}}">{{$city->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">địa chỉ chi tiết</label>
                                    <div class="controls">
                                        <input type="text" name="address" id="required">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">chi tiết bài viết</label>
                                    <div class="controls">
                                        <textarea type="text" name="description" id="summary-ckeditor"></textarea>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">ảnh bài viết </label>
                                    <div class="control">
                                        <input style="margin: 0 22px;" type="file" name="image">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">giá mong muốn</label>
                                    <div class="controls">
                                        <input type="number" name="price" id="required">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">trạng thái</label>
                                    <div class="controls">
                                        <select name="status" >
                                            <option value="0">ẩn</option>
                                            <option value="1">hiện</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">loai nha</label>
                                    <div class="controls">
                                        <select name="apartment_type">
                                            <option value="villa">villa</option>
                                            <option value="house">house</option>
                                            <option value="condo">condo</option>
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