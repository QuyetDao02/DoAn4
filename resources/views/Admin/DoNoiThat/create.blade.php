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
                            <h3 class="card-title">Thêm đồ nội thất</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{route('DoNoiThat.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên đồ nội thất</label>
                                    <input name="TenDNT" type="text" class="form-control"
                                        placeholder="Tên đồ nội thất">
                                </div>
                                
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Loại đồ nội thất</label>
                                    <select name="MaLDNT" class="form-control">
                                        @foreach ($db as $item)
                                            <option value="{{$item->id}}">{{$item->TenLDNT}}</option>
                                        @endforeach
                                        
                                      </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Giá nhập</label>
                                    <input name="GiaNhap" type="number" class="form-control" 
                                        placeholder="Giá nhập">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Giá bán</label>
                                    <input name="GiaBan" type="number" class="form-control" 
                                        placeholder="Giá bán">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hình ảnh</label>
                                    <br>
                                    {{-- <input name="HinhAnh" type="file"> --}}
                                    <input type="file" name="image">
                                    {{-- <button type="submit">Upload</button> --}}
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả</label>
                                    {{-- <input name="MoTa" type="text" class="form-control"
                                        placeholder="Mô tả"> --}}
                                        <textarea name="MoTa" id="cdk"></textarea>
                                </div>
                                
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
