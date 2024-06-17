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
                        <form action="{{ route('DoNoiThat.show', ['id' => $db->id]) }}" method="post">
                            @csrf

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="TenDNT">Tên đồ nội thất</label>
                                    <p>{{ $db->TenDNT }}</p>
                                </div>

                                <div class="form-group">
                                    <label for="teLDNT">Loại đồ nội thất</label>
                                    <p>{{ $db->TenLDNT }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="HinhAnh">Hình ảnh</label>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-4 mb-4">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <img class="w-100" src="{{ $db->HinhAnh }}" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                            @foreach ($ct as $item)
                                                @if ($item->id == $id)
                                                    <div class="col-md-4 mb-4">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <img class="w-100" src="{{ $item->HinhAnh }}"
                                                                    alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                @else
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <a href="{{ route('ChiTietAnh.create', $id) }}" class="btn btn-primary">Thêm
                                        ảnh</a>
                                </div>

                                <div class="form-group">
                                    <label for="MoTa">Mô tả</label>
                                    <p>{!! $db->MoTa !!}</p>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <a href="{{ route('DoNoiThat.index') }}" class="btn btn-success">Quay lại</a>
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
