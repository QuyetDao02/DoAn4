@extends('Admin/layout')
@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('TinTuc.create') }}" class="btn btn-info">Thêm</a>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Mã tin tức</th>
                            <th>Ảnh</th>
                            <th>Tiêu đề</th>
                            <th>Ngày đăng</th>
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
                                    {{ $item->MaTT }}
                                </td>
                                <td>
                                    <img src="{{ $item->Anh }}" alt="" style="width: 100px">

                                </td>
                                <td>
                                    {{ $item->TieuDe }}
                                </td>
                                <td>
                                    {{ $item->NgayDang }}
                                </td>
                                
                                <td class="w-25">
                                    <form action="" method="post"
                                        class="d-flex flex-wrap align-content-center justify-content-around ">
                                        @csrf
                                        <a href="{{ route('TinTuc.edit', $item->MaTT) }}" style="margin: 20% 0px 20% 0px"
                                            class="btn btn-success">Sửa</a>
                                        <a href="{{ route('TinTuc.delete', $item->MaTT) }}"
                                            style="margin: 20% 0px 20% 0px" onclick="confirm('Bạn có thật sự muốn xóa?')"
                                            class="btn btn-danger">Xóa</a>
                                        <a href="{{ route('TinTuc.show', $item->MaTT) }}" style="margin: 20% 0px 20% 0px"
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
