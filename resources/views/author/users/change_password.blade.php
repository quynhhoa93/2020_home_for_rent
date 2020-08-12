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
                            <form class="form-horizontal" method="post" action="{{route('author.postEditPassword')}}" name="basic_validate" id="basic_validate" novalidate="novalidate">
                                @csrf
                                <div class="control-group">
                                    <label class="control-label">nhập password mới </label>
                                    <div class="controls">
                                        <input type="password" name="password" id="required">
                                    </div>
                                    <div class="controls">
                                        <p class="help is-danger" style="color: #b91d19">{{ $errors->first('password') }}</p>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">nhập lại password mới </label>
                                    <div class="controls">
                                        <input type="password" name="re_password" id="required">
                                    </div>
                                    <div class="controls">
                                        <p class="help is-danger" style="color: #b91d19">{{ $errors->first('re_password') }}</p>
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