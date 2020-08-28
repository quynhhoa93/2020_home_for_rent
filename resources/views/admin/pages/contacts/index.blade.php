@extends('admin.layouts.master')
@section('title')
    liên hệ
@endsection

@push('css')
@endpush

@section('content')
    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="{{route('admin.dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> trang chủ</a> <a href="{{route('admin.getContact')}}" class="current">phản ánh của khách hàng</a> </div>
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
                                    <th>tên khách hàng</th>
                                    <th>email</th>
                                    <th>số điện thoại</th>
                                    <th>tiêu đề</th>
                                    <th>lời nhắn</th>
                                    <th>hành động</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($contacts as $key=>$contact)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{$contact->name}}</td>
                                        <td>{{$contact->email}}</td>
                                        <td>{{$contact->phone}}</td>
                                        <td>{{$contact->subject}}</td>
                                        <td class="center">{!! str_limit($contact->message, 30) !!}</td>
                                        <td class="center">
                                            <a href="{{route('admin.singleContact',$contact->id)}}" class="btn btn-success btn-mini">xem chi tiết</a>
                                            {{--<button class="btn btn-warning btn-mini">btn-warning</button>--}}
                                            <button class="btn btn-danger btn-mini" type="button" onclick="deleteCategory({{$contact->id}})"><i>xoá</i></button>
                                            <form id="delete-from-{{$contact->id}}" action="{{route('admin.deleteContact',$contact->id)}}" method="POST" style="display:none;">
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
                confirmButtonText:'có',
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