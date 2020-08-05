@extends('admin.layouts.master')
@section('title')
    tạo thể loại mới
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
                            <form class="form-horizontal" method="post" action="{{route('admin.category.store')}}" name="basic_validate" id="basic_validate" novalidate="novalidate">
                                @csrf
                                <div class="control-group">
                                    <label class="control-label">tên danh mục</label>
                                    <div class="controls">
                                        <input type="text" name="name" id="required">
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
                                    <label class="control-label">danh mục con(nếu có)</label>
                                    <div class="controls">
                                        <select name="parent_id">
                                            <option value="0">danh mục gốc</option>
                                            @foreach($levels as $level)
                                            <option value="{{$level->id}}">{{$level->name}}</option>
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