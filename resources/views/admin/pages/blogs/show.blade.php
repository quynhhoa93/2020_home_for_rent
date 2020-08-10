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

                    <div>
                        @if($blog->is_approved == 1)
                            <button type="button" class="btn btn-success pull-right">
                                <span>đã được phê duyệt</span>
                            </button>
                        @else
                            <button type="button" class="btn btn-danger pull-right" onclick="approvePost({{ $blog->id }})">
                                <span>chua được phê duyệt</span>
                            </button>
                            <form method="post" action="{{ route('admin.blog.approve',$blog->id) }}" id="approval-form" style="display: none">
                                @csrf
                                @method('PUT')
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script type="text/javascript">
        function approvePost(id){
            const swalWithBootstrapButtons=Swal.mixin({
                customClass:{
                    confirmButton:'btnbtn-success',
                    cancelButton:'btnbtn-danger'
                },
                buttonsStyling:false
            })

            swalWithBootstrapButtons.fire({
                title:'xoá danh mục',
                text:"bạn có chắc muốn xoá san pham này???",
                icon:'warning',
                showCancelButton:true,
                confirmButtonText:'có ',
                cancelButtonText:'thôi',
                reverseButtons:true
            }).then((result)=>{
                if(result.value){
                    event.preventDefault();
                    document.getElementById('approval-form').submit();
                }else if(
                    result.dismiss === Swal.DismissReason.cancel
                ){
                    swalWithBootstrapButtons.fire(
                        'cảnh báo',
                        'san pham này vẫn tồn tại',
                        'error'
                    )
                }
            })
        }
    </script>
@endpush