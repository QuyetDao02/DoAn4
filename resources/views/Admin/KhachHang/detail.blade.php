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
                            <h3 class="card-title">Thông tin</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('KhachHang.show', ['id' => $db->MaKH]) }}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="TenDNT">Tên khách hàng</label>
                                    <p>{{$db->TenKH}}</p>
                                </div>
                                <div class="form-group">
                                    <label for="TenDNT">Email</label>
                                    <p>{{$db->Email}}</p>
                                </div>
                                <div class="form-group">
                                    <label for="TenDNT">Địa chỉ</label>
                                    <p>{{$db->DiaChi}}</p>
                                </div>
                                <div class="form-group">
                                    <label for="TenDNT">Số điện thoại</label>
                                    <p>{{$db->SDT}}</p>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <a href="{{route('KhachHang.index')}}" class="btn btn-success">Quay lại</a>
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
