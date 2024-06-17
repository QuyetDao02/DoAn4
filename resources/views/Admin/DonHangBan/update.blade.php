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
                        <form action="{{ route('DonHangBan.update', ['id' => $db->id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Khách hàng</label>
                                    <input name="MaKH" type="text" class="form-control"
                                       value="{{$db->MaKH}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Ngày lập</label>
                                    <input name="NgayLap" type="date" class="form-control" 
                                        value="{{$db->NgayLap}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Địa chỉ</label>
                                    <input name="DiaChi" type="text" class="form-control"
                                        value="{{$db->DiaChi}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Tình trạng</label>
                                    <select name="TinhTrang" class="form-control">
                                        <option value="{{$db->TinhTrang}}"></option>
                                        <option value="0">Chưa thanh toán</option>
                                        <option value="1">Đã thanh toán</option>
                                      </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tổng tiền</label>
                                    <input name="TongTien" type="number" class="form-control"
                                        value="{{$db->TongTien}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Ghi chú</label>
                                    <input name="GhiChu" type="text" class="form-control" 
                                        value="{{$db->GhiChu}}">
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
