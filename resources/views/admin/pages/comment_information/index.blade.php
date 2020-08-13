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
                        <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
                            <h5>Static table</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <table class="table table-bordered table-striped" id="table_id">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>người đăng</th>
                                    <th>bình luận</th>
                                    <th>đường dẫn đến baì viết</th>
                                    <th>hành động</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($comments as $key=>$comment)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{$comment->user->name}}</td>
                                        <td>{{$comment->com}}</td>
                                        <td>http://127.0.0.1:8000/{{$comment->information->slug}}</td>
                                        <td class="center">
                                            {{--<a href="{{route('admin.blogs.show',$blog->id)}}" class="btn btn-success btn-mini">chi tiết</a>--}}
                                            {{--<a href="{{route('admin.blogs.edit',$blog->id)}}" class="btn btn-warning btn-mini">Sửa</a>--}}
                                            <button class="btn btn-danger btn-mini" type="button" onclick="deleteCategory({{$comment->id}})"><i>xoá</i></button>
                                            <form id="delete-from-{{$comment->id}}" action="{{route('admin.comment-information.destroy',$comment->id)}}" method="POST" style="display:none;">
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