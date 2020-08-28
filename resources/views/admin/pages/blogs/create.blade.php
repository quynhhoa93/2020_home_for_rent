@extends('admin.layouts.master')
@section('title')
    tạo bài viết mới
@endsection

@push('css')
@endpush

@section('content')
    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="{{route('admin.dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> trang chủ</a> <a href="{{route('admin.blogs.index')}}">blogs</a> <a href="{{route('admin.blogs.create')}}" class="current">tạo bài viết mới</a> </div>
        </div>
        <div class="container-fluid"><hr>
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                            <h5>Form validation</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <form class="form-horizontal" method="post" action="{{route('admin.blogs.store')}}" name="basic_validate" id="basic_validate" novalidate="novalidate" enctype="multipart/form-data">
                                @csrf
                                <div class="control-group">
                                    <label class="control-label">tên bài viết</label>
                                    <div class="controls">
                                        <input type="text" name="title" id="required" value="{{old('title')}}">
                                    </div>
                                    <div class="controls">
                                    <p class="help is-danger" style="color: #b91d19">{{ $errors->first('title') }}</p>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">chi tiết bài viết</label>
                                    <div class="controls">
                                        <textarea type="text" name="body" id="summary-ckeditor">{{old('body')}}</textarea>
                                    </div>
                                    <div class="controls">
                                        <p class="help is-danger" style="color: #b91d19">{{ $errors->first('body') }}</p>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">ảnh bài viết </label>
                                    <div class="control">
                                        <input style="margin: 0 22px;" type="file" name="image" value="them anh" placeholder="sdhcgsndbmcns">
                                    </div>
                                    <div class="controls">
                                        <p class="help is-danger" style="color: #b91d19">{{ $errors->first('image') }}</p>
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