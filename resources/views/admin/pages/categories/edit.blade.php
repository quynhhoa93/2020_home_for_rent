@extends('admin.layouts.master')
@section('title')
    tạo thể loại mới
@endsection

@push('css')
@endpush

@section('content')
    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="{{route('admin.dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> trang chủ</a> <a href="{{route('admin.category.index')}}">danh mục</a> <a href="{{route('admin.category.edit',$category->id)}}" class="current">sửa danh mục</a> </div>
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
                            <form class="form-horizontal" method="post" action="{{route('admin.category.update',$category->id)}}" name="basic_validate" id="basic_validate" novalidate="novalidate">
                                @csrf
                                @method('PUT')
                                <div class="control-group">
                                    <label class="control-label">tên danh mục</label>
                                    <div class="controls">
                                        <input type="text" name="name" id="required" value="{{$category->name}}">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">trạng thái</label>
                                    <div class="controls">
                                        <select name="status" >
                                            <option value="0" @if($category->status == 0)selected @endif>ẩn</option>
                                            <option value="1" @if($category->status == 1)selected @endif>hiện</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">danh mục con của(nếu có)</label>
                                    <div class="controls">
                                        <select name="parent_id">
                                            <option value="0">danh mục gốc</option>
                                            @foreach($levels as $level)
                                                <option value="{{$level->id}}" @if($level->id == $category->parent_id)selected @endif>{{$level->name}}</option>
                                            @endforeach
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