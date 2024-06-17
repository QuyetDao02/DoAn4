@extends('Admin/layout')
@section('content')
    <div class="card">
        <div class="card-header">
            {{-- <a href="{{ route('ChiTietDHB.create') }}" class="btn btn-info">Thêm</a> --}}
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Đồ nội thất</th>
                            <th>Số lượng</th>
                            <th>Giá</th>
                            <th>Tổng tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                      @php
                          $i = 0;
                      @endphp
                        @foreach ($data as $item)
                            <tr>
                                <td>
                                  @php
                                    $i += 1;
                                    echo $i;
                                  @endphp
                              
                                </td>
                                <td>
                                    {{ $item->TenDNT }}
                                </td>
                                <td>
                                    {{ $item->SoLuong }}
                                </td>
                                <td>
                                    {{ number_format($item->Gia, 0, ',', '.') }}₫
                                </td>
                                <td>
                                    {{ number_format($item->Gia * $item->SoLuong, 0, ',', '.') }}₫
                                </td>
                                {{-- <td>
                                    <form action="" method="post"
                                        class="d-flex flex-wrap align-content-center justify-content-around ">
                                        @csrf
                                        <a href="{{ route('ChiTietDHB.edit', $item->id) }}" style="margin: 20% 0px 20% 0px"
                                            class="btn btn-success">Sửa</a>
                                            @if ($item->DonHangBan->TinhTrang == 0)
                                            <a href="{{ route('ChiTietDHB.delete', $item->id) }}"
                                                style="margin: 20% 0px 20% 0px" onclick="confirm('Bạn có thật sự muốn xóa?')"
                                                class="btn btn-danger">Xóa</a>
                                            @endif
                                        
                                    </form>
                                </td> --}}
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
