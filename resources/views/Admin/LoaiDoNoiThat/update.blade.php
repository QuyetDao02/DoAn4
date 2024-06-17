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
                            <h3 class="card-title">Sửa loại đồ nội thất</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{route('LoaiDoNoiThat.update', ['id' => $db->id])}}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="TenLDNT">Tên loại đồ nội thất</label>
                                    <input name="TenLDNT" type="text" class="form-control"
                                        value="{{$db->TenLDNT}}">
                                </div>
                                <div class="form-group">
                                    <label for="MoTa">Mô tả</label>
                                    <input name="MoTa" type="text" class="form-control"
                                        value="{{$db->MoTa}}">
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
