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
            <h1><a href="{{route('admin.blogs.create')}}" class="btn btn-success btn-large" >thêm bài viết mới</a> </h1>
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
                            <table class="table table-bordered table-striped" id="table_id">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>tên</th>
                                    <th>nickname</th>
                                    <th>email</th>
                                    <th>số điện thoại</th>
                                    <th>ảnh bài viết</th>
                                    <th>hành động</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $key=>$user)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->username}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->phone}}</td>

                                        <td><img src="{{asset('backend/img/users/small/'.$user->image)}}" style="width: 100px"></td>
                                        <td class="center">
                                            {{--<a href="{{route('admin.blogs.show',$blog->id)}}" class="btn btn-success btn-mini">chi tiết</a>--}}
                                            {{--<a href="{{route('admin.blogs.edit',$blog->id)}}" class="btn btn-warning btn-mini">Sửa</a>--}}
                                            <button class="btn btn-danger btn-mini" type="button" onclick="deleteCategory({{$user->id}})"><i>xoá</i></button>
                                            <form id="delete-from-{{$user->id}}" action="{{route('admin.users.destroy',$user->id)}}" method="POST" style="display:none;">
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

@endpush