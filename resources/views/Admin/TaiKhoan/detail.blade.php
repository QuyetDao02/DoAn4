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
                        <form action="{{ route('TaiKhoan.show', ['id' => $db->userID]) }}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="TenDNT">Tên đăng nhập</label>
                                    <p>{{$db->UserName}}</p>
                                </div>
                                <div class="form-group">
                                    <label for="TenDNT">Mật khẩu</label>
                                    <p>{{$db->Password}}</p>
                                </div>
                                <div class="form-group">
                                    <label for="TenDNT">Quyền</label>
                                    @if ($db->role == 0)
                                        <p>Khách hàng</p> 
                                    @else
                                        <p>Admin</p>
                                    @endif
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <a href="{{route('TaiKhoan.index')}}" class="btn btn-success">Quay lại</a>
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
