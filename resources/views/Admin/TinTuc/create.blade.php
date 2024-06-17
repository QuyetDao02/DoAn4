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
                            <h3 class="card-title">Thêm tin tức</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('TinTuc.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tiêu đề</label>
                                    <input name="TieuDe" type="text" class="form-control" placeholder="Tiêu đề">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nhân viên đăng</label>
                                    <select name="MaNV" type="text" class="form-control">
                                        @foreach ($db as $item)
                                            <option value="{{ $item->MaNV }}">{{ $item->TenNV }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hình ảnh</label>
                                    <br>
                                    {{-- <input name="HinhAnh" type="file"> --}}
                                    <input type="file" name="image">
                                    {{-- <button type="submit">Upload</button> --}}
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Ngày đăng</label>
                                    <input name="NgayDang" type="date" class="form-control" placeholder="Ngày đăng">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nội dung</label>
                                    {{-- <input name="MoTa" type="text" class="form-control"
                                        placeholder="Mô tả"> --}}
                                    <textarea name="NoiDung" id="cdk"></textarea>
                                </div>

                                {{-- <div class="form-group">
                  <label for="exampleInputFile">Hình ảnh</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="exampleInputFile">
                      <label class="custom-file-label" for="exampleInputFile">Mô tả</label>
                    </div>
                    <div class="input-group-append">
                      <span class="input-group-text">Upload</span>
                    </div>
                  </div>
                </div>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="exampleCheck1">
                  <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div> --}}
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Thêm</button>
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
