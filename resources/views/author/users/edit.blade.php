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
                            <form class="form-horizontal" method="post" action="{{route('author.users.update',$user->id)}}" name="basic_validate" id="basic_validate" novalidate="novalidate" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="control-group">
                                    <label class="control-label">tên</label>
                                    <div class="controls">
                                        <input type="text" name="name" id="required" value="{{$user->name}}">
                                    </div>
                                    <div class="controls">
                                        <p class="help is-danger" style="color: #b91d19">{{ $errors->first('name') }}</p>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">nickname</label>
                                    <div class="controls">
                                        <input type="text" name="username" id="required" value="{{$user->username}}">
                                    </div>
                                    <div class="controls">
                                        <p class="help is-danger" style="color: #b91d19">{{ $errors->first('username') }}</p>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">email</label>
                                    <div class="controls">
                                        <input type="text" name="email" id="required" value="{{$user->email}}">
                                    </div>
                                    <div class="controls">
                                        <p class="help is-danger" style="color: #b91d19">{{ $errors->first('name') }}</p>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">phone</label>
                                    <div class="controls">
                                        <input type="text" name="phone" id="required" value="{{$user->phone}}">
                                    </div>
                                    <div class="controls">
                                        <p class="help is-danger" style="color: #b91d19">{{ $errors->first('phone') }}</p>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">mô tả bản thân</label>
                                    <div class="controls">
                                        <textarea type="text" name="about" id="summary-ckeditor">{!! $user->about !!}</textarea>
                                    </div>
                                    <div class="controls">
                                        <p class="help is-danger" style="color: #b91d19">{{ $errors->first('body') }}</p>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">ảnh bài viết </label>
                                    <div class="control">
                                        <input style="margin: 0 22px;" type="file" name="image">
                                        <input type="hidden" name="current_image" value="{{$user->image}}">
                                    </div>
                                    <div class="controls">
                                        <p class="help is-danger" style="color: #b91d19">{{ $errors->first('image') }}</p>
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