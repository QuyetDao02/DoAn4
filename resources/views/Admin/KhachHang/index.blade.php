@extends('Admin/layout')
@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('KhachHang.create') }}" class="btn btn-info">Thêm</a>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Mã khách hàng</th>
                            <th>Tên khách hàng</th>
                            <th>Email</th>
                            <th>Địa chỉ</th>
                            <th>Số điện thoại</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                      @php
                          $i = 0;
                      @endphp
                        @foreach ($db as $item)
                            <tr>
                                <td>
                                  @php
                                    $i += 1;
                                    echo $i;
                                  @endphp
                              
                                </td>
                                <td>
                                    {{ $item->MaKH }}
                                </td>
                                <td>
                                    {{ $item->TenKH }}
                                </td>
                                <td>
                                    {{ $item->Email }}
                                </td>
                                <td>
                                    {{ $item->DiaChi }}
                                </td>
                                <td>
                                    {{ $item->SDT }}
                                </td>
                                <td class="w-25">
                                    <form action="" method="post"
                                        class="d-flex flex-wrap align-content-center justify-content-around ">
                                        @csrf
                                        <a href="{{ route('KhachHang.edit', $item->MaKH) }}" style="margin: 20% 0px 20% 0px"
                                            class="btn btn-success">Sửa</a>
                                        <a href="{{ route('KhachHang.delete', $item->MaKH) }}"
                                            style="margin: 20% 0px 20% 0px" onclick="confirm('Bạn có thật sự muốn xóa?')"
                                            class="btn btn-danger">Xóa</a>
                                        <a href="{{ route('KhachHang.show', $item->MaKH) }}" style="margin: 20% 0px 20% 0px"
                                            class="btn btn-primary ">Thông tin</a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>

                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection
