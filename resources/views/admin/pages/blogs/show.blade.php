@extends('admin.layouts.master')
@section('title')
    liên hệ
@endsection

@push('css')
@endpush

@section('content')
    <div id="content">
        <div id="content-header">
            {{--<h1>{{$blog->title}}</h1>--}}
        </div>
        <div class="container-fluid">
            <hr>
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-list"></i> </span>
                            <h5>{{$blog->title}}</h5>
                        </div>
                        <div><img src="{{asset('backend/img/blog/small/'.$blog->image)}}"></div>
                        <div class="widget-content"> {!! $blog->body !!}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('js')
@endpush