@extends('Admin/layout')
@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('LoaiDoNoiThat.create') }}" class="btn btn-info">Thêm</a>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Mã loại đồ nội thất</th>
                            <th>Tên loại đồ nội thất</th>
                            <th>Mô tả</th>
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
                                    {{ $item->TenLDNT }}
                                </td>
                                <td>
                                    {{ $item->MoTa }}
                                </td>
                                <td class="w-25">
                                    <form action="" method="post"
                                        class="d-flex flex-wrap align-content-center justify-content-around ">
                                        @csrf
                                        <a href="{{ route('LoaiDoNoiThat.edit', $item->id) }}"
                                            style="margin: 20% 0px 20% 0px" class="btn btn-success">Sửa</a>
                                        <a href="{{ route('LoaiDoNoiThat.delete', $item->id) }}"
                                            style="margin: 20% 0px 20% 0px" onclick="confirm('Bạn có thật sự muốn xóa?')"
                                            class="btn btn-danger">Xóa</a>
                                        <a href="{{ route('LoaiDoNoiThat.show', $item->id) }}"
                                            style="margin: 20% 0px 20% 0px" class="btn btn-primary ">Thông tin</a>
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
