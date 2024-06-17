@extends('Admin/layout')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="w-100">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Sửa đồ nội thất</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('DoNoiThat.update', ['id' => $db->id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên đồ nội thất</label>
                                    <input name="TenDNT" type="text" class="form-control" value="{{$db->TenDNT}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Loại đồ nội thất</label>
                                    <select name="MaLDNT" class="form-control">
                                        @foreach ($data as $item)
                                            <option value="{{$item->id}}">{{$item->TenLDNT}}</option>
                                        @endforeach
                                        
                                      </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Giá nhập</label>
                                    <input name="GiaNhap" type="number" class="form-control" 
                                        value="{{$db->GiaNhap}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Giá bán</label>
                                    <input name="GiaBan" type="number" class="form-control" 
                                        value="{{$db->GiaBan}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hình ảnh</label>
                                    {{-- <br> --}}
                                    <input name="image" type="file" value="{{$db->HinhAnh}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả</label>
                                    {{-- <input name="MoTa" type="text" class="form-control"
                                        placeholder="Mô tả"> --}}
                                        <textarea name="MoTa" id="cdk">{{$db->MoTa}}</textarea>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Sửa</button>
                                </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection
