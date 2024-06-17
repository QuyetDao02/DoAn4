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
                        <form action="{{ route('TinTuc.show', ['id' => $db->MaTT]) }}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="TenDNT">Tiêu đề</label>
                                    <p>{{$db->TieuDe}}</p>
                                </div>
                                <div class="form-group">
                                    <label for="TenDNT">Nhân viên đăng</label>
                                    <p>{{$db->TenNV}}</p>
                                </div>
                                <div class="form-group">
                                    <label for="Anh">Hình ảnh</label>
                                    <br>
                                    <img src="{{ $db->Anh }}" alt="">
                                </div>
                                <div class="form-group">
                                    <label for="NgayDang">Ngày đăng: </label>
                                    <span>{{$db->NgayDang}}</span>
                                </div>
                                <div class="form-group">
                                    <label for="NoiDung">Nội dung</label>
                                    <p>{!! $db->NoiDung !!}</p>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <a href="{{route('TinTuc.index')}}" class="btn btn-success">Quay lại</a>
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
