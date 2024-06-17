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
                            <h3 class="card-title">Sửa tin tức</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('TinTuc.update', ['id' => $db->MaTT]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tiêu đề</label>
                                    <input name="TieuDe" type="text" class="form-control"
                                        value="{{$db->TieuDe}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nhân viên đăng</label>
                                    <select name="MaNV" type="text" class="form-control">
                                        @foreach ($data as $item)
                                            <option value="{{ $item->MaNV }}">{{ $item->TenNV }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hình ảnh</label>
                                    <br>
                                    {{-- <input name="HinhAnh" type="file"> --}}
                                    <input type="file" name="image" value="{{$db->Anh}}">
                                    {{-- <button type="submit">Upload</button> --}}
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Ngày đăng</label>
                                    <input name="NgayDang" type="date" class="form-control" value="{{$db->NgayDang}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nội dung</label>
                                    {{-- <input name="MoTa" type="text" class="form-control"
                                        placeholder="Mô tả"> --}}
                                        <textarea name="NoiDung" id="cdk" value="{{$db->NoiDung}}"></textarea>
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
