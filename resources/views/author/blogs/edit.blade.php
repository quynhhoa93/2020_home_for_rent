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
                            <form class="form-horizontal" method="post" action="{{route('author.blogs.update',$blog->id)}}" name="basic_validate" id="basic_validate" novalidate="novalidate" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="control-group">
                                    <label class="control-label">tên bài viết</label>
                                    <div class="controls">
                                        <input type="text" name="title" id="required" value="{{$blog->title}}">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">chi tiết bài viết</label>
                                    <div class="controls">
                                        <textarea type="text" name="body" id="summary-ckeditor">{!! $blog->body !!}</textarea>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">ảnh bài viết </label>
                                    <div class="control">
                                        <input style="margin: 0 22px;" type="file" name="image">
                                        <input type="hidden" name="current_image" value="{{$blog->image}}">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">trạng thái</label>
                                    <div class="controls">
                                        <select name="status" >
                                            <option value="0" @if($blog->status == 0)selected @endif>ẩn</option>
                                            <option value="1" @if($blog->status == 1)selected @endif>hiện</option>
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