@extends('admin.layouts.master')
@section('title')
    bài viết
@endsection

@push('css')
@endpush

@section('content')
    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Tables</a> </div>
            <h1>Tables</h1>
            <h1><a href="{{route('admin.information.create')}}" class="btn btn-success btn-large" >thêm bài viết mới</a> </h1>
        </div>
        <div class="container-fluid">
            <hr>
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
                            <h5>Static table</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <table class="table table-bordered table-striped" id="table_id" >
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>tên bài viết</th>
                                    <th>chi tiết bài viết</th>
                                    <th>trạng thái</th>
                                    <th>ảnh bài viết</th>
                                    <th>hành động</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($informations as $key=>$information)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{$information->name}}</td>
                                        <td>{!! str_limit($information->description,30) !!}</td>
                                        <td>
                                            @if($information->status == 0)
                                                ẩn
                                            @else
                                                hiện
                                            @endif
                                        </td>


                                        <td><img src="{{asset('backend/img/information/small/'.$information->image)}}" style="width: 100px"></td>
                                        <td class="center">
                                            @if($information->is_approve == 1)
                                                <button type="button" class="btn btn-success btn-mini ">
                                                    <span>đã được phê duyệt</span>
                                                </button>l
                                            @else
                                                <button type="button" class="btn btn-danger btn-mini" onclick="approvePost({{ $information->id }})">
                                                    <span>chua được phê duyệt</span>
                                                </button>
                                                <form method="post" action="{{ route('admin.information.approve',$information->id) }}" id="approval-form" style="display: none">
                                                    @csrf
                                                    @method('PUT')
                                                </form>
                                            @endif

                                            <a href="{{route('admin.information.show',$information->id)}}" class="btn btn-success btn-mini">chi tiết</a>
                                            <a href="{{route('admin.information.edit',$information->id)}}" class="btn btn-warning btn-mini">Sửa</a>
                                            <button class="btn btn-danger btn-mini" type="button" onclick="deleteCategory({{$information->id}})"><i>xoá</i></button>
                                            <form id="delete-from-{{$information->id}}" action="{{route('admin.information.destroy',$information->id)}}" method="POST" style="display:none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script type="text/javascript">
        function deleteCategory(id){
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
                    document.getElementById('delete-from-'+id).submit();
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