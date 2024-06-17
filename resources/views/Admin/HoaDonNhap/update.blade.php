@extends('Admin/layout')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Sửa đồ nội thất</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('HoaDonNhap.update', ['id' => $db->id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nhân viên</label>
                                    <select name="MaNV" class="form-control">
                                        @foreach ($nv as $item)
                                            <option value="{{$item->MaNV}}">{{$item->TenNV}}</option>
                                        @endforeach
                                      </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nhà cung cấp</label>
                                    <select name="MaNCC" class="form-control">
                                        @foreach ($ncc as $item)
                                            <option value="{{$item->MaNCC}}">{{$item->TenNCC}}</option>
                                        @endforeach
                                      </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Ngày nhập</label>
                                    <input name="NgayNhap" type="date" class="form-control" 
                                        value="{{$db->NgayNhap}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Tình trạng</label>
                                    <select name="TinhTrang" class="form-control">
                                        <option value="{{$db->TinhTrang}}"></option>
                                        <option value="0">Chưa thanh toán</option>
                                        <option value="1">Đã thanh toán</option>
                                      </select>
                                </div>

                            </div>
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
