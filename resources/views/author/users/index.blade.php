@extends('admin.layouts.master')
@section('title')
    bài viết
@endsection

@push('css')
@endpush

@section('content')
    <div id="content">

        <div class="container-fluid">
            <hr>
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-content nopadding">
                            <table class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>tên</th>
                                    <th>nickname</th>
                                    <th>email</th>
                                    <th>số điện thoại</th>
                                    <th>ảnh bài viết</th>
                                    <th>hành động</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{Auth::user()->name}}</td>
                                        <td>{{Auth::user()->username}}</td>
                                        <td>{{Auth::user()->email}}</td>
                                        <td>{{Auth::user()->phone}}</td>

                                        <td><img src="{{asset('backend/img/users/small/'.\Illuminate\Support\Facades\Auth::user()->image)}}" style="width: 100px"></td>
                                        <td class="center">
                                            {{--<a href="{{route('author.users.show',Auth::user()->id)}}" class="btn btn-success btn-mini">chi tiết</a>--}}
                                            <a href="{{route('author.users.edit',Auth::user()->id)}}" class="btn btn-warning btn-mini">Sửa</a>
                                            <a href="{{route('author.editPassword',Auth::user()->id)}}" class="btn btn-warning btn-mini">đổi mật khẩu</a>

                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
@endpush