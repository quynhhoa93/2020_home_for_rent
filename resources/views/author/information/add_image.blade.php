@extends('admin.layouts.master')
@section('title')
    bài viết
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
                            <form class="form-horizontal" method="post" action="{{route('author.postInformationImages')}}" name="basic_validate" id="basic_validate" novalidate="novalidate" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="information_id" value="{{$informationDetails->id}}">

                                <div class="control-group">
                                    <label class="control-label">tiêu đề : {{$informationDetails->name}}</label>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">thành phố : {{$informationDetails->city}}</label>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">địa chỉ chi tiết : {{$informationDetails->address}}</label>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">thêm ảnh mô tả chi tiết</label>
                                    <div class="control">
                                        <input style="margin: 0 22px;" type="file" name="image[]">
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <input type="submit" value="Lưu" class="btn btn-success">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <br>
        <br>
        <br>

        <div class="widget-content nopadding">
            <table class="table table-bordered table-striped" id="table_id">
                <thead>
                <tr>
                    <th></th>
                    <th>ảnh chi tiết</th>
                    <th>hành động</th>
                </tr>
                </thead>
                <tbody>
                @foreach($informationImages as $key=>$informationImage)
                    <tr>
                        <td>{{++$key}}</td>
                        <td><img src="{{url('backend/img/information_image/medium/'.$informationImage->image)}}" style="width: 150px"></td>
                        <td class="center">
                            <button class="btn btn-danger btn-large" type="button" onclick="deleteCategory({{$informationImage->id}})"><i>xoá</i></button>
                            <form id="delete-from-{{$informationImage->id}}" action="{{route('author.deleteAltImage',$informationImage->id)}}" method="POST" style="display:none;">
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