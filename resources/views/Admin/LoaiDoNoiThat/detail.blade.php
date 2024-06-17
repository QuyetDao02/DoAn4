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
                        <form action="{{ route('LoaiDoNoiThat.show', ['id' => $db->id]) }}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="TenLDNT">Tên loại đồ nội thất</label>
                                    <p>{{$db->TenLDNT}}</p>
                                </div>
                                <div class="form-group">
                                    <label for="MoTa">Mô tả</label>
                                    <p>{{$db->MoTa}}</p>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <a href="{{route('LoaiDoNoiThat.index')}}" class="btn btn-success">Quay lại</a>
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
