@extends('Admin/layout')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Hình ảnh</th>
                            <th>Đồ nội thất</th>
                            <th>Số lượng</th>
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
                                    <img src="{{ $item->HinhAnh }}" alt="" style="width: 100px">

                                </td>
                                <td>
                                    {{ $item->TenDNT }}
                                </td>
                                <td>
                                    {{ $item->SoLuong }}
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
