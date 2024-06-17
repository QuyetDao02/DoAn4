@extends('Admin/layout')
@section('content')
    <div class="card">
        <div class="card-header">
            {{-- <a href="{{ route('DonHangBan.create') }}" class="btn btn-info">Thêm</a> --}}
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Mã đơn hàng bán</th>
                            <th>Khách hàng</th>
                            <th>Ngày lập</th>
                            <th>Địa chỉ</th>
                            <th>Tổng tiền</th>
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
                                    {{ $item->id }}
                                </td>
                                <td>
                                    {{ $item->TenKH }}
                                </td>
                                <td>
                                    {{ $item->NgayLap }}
                                </td>
                                <td>
                                    {{ $item->DiaChi }}
                                </td>
                                <td>
                                    {{ number_format($item->TongTien, 0, ',', '.') }}₫
                                </td>

                                <td class="w-25">
                                    <form action="" method="post"
                                        class="d-flex flex-wrap align-content-center justify-content-around ">
                                        @csrf
                                        <a href="{{ route('DonHangBan.edit', $item->id) }}" style="margin: 20% 0px 20% 0px"
                                            class="btn btn-success">Sửa</a>
                                        <a href="{{ route('DonHangBan.delete', $item->id) }}"
                                            style="margin: 20% 0px 20% 0px" onclick="confirm('Bạn có thật sự muốn xóa?')"
                                            class="btn btn-danger">Xóa</a>
                                        <a href="{{ route('ChiTietDHB.index', $item->id) }}" style="margin: 20% 0px 20% 0px"
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