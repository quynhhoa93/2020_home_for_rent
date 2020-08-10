@extends('admin.layouts.master')
@section('title')
    danh mục
@endsection

@push('css')
@endpush

@section('content')
    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Tables</a> </div>
            <h1>Tables <a href="{{route('admin.type-asset.create')}}" class="btn btn-success btn-large" >thêm danh mục mới</a> </h1>
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
                                    <th>tên danh mục</th>
                                    <th>hành động</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($typeAssets as $key=>$asset)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{$asset->name}}</td>

                                        <td class="center">
                                            {{--<a href="{{route('admin.singleContact',$contact->id)}}" class="btn btn-success btn-mini">xem chi tiết</a>--}}
                                            <a href="{{route('admin.type-asset.edit',$asset->id)}}" class="btn btn-warning btn-mini">Sửa</a>
                                            <button class="btn btn-danger btn-mini" type="button" onclick="deleteCategory({{$asset->id}})"><i>xoá</i></button>
                                            <form id="delete-from-{{$asset->id}}" action="{{route('admin.type-asset.destroy',$asset->id)}}" method="POST" style="display:none;">
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