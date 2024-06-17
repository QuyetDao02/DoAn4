@extends('Home/layout')
@section('content')

    <!-- breadcrumb start-->

    <!--================Cart Area =================-->
    <section class="cart_area padding_top">
        <div class="container">
            <div class="cart_inner">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Hình ảnh</th>
                                <th class="w-50" scope="col">Tên đồ nội thất</th>
                                <th scope="col">Giá</th>
                                <th style="width:15%" scope="col">Số lượng</th>
                                <th scope="col">Tổng tiền</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cartItems as $item)
                                <tr>
                                    <td>
                                        <img src="{{ $item->attributes->image }}" class="w-100" alt="">
                                    </td>
                                    <td>
                                        {{ $item->name }}
                                    </td>
                                    <td>
                                        {{ number_format($item->price, 0, ',', '.') }}₫
                                    </td>
                                    <td>
                                        <form action="{{ route('cart.update') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $item->id }}">
                                            <input class="w-25" type="number" name="quantity" id=""
                                                value="{{ $item->quantity }}">
                                            <button type="submit" class="px-2 pb-2 ml-2 text-white btn-primary"><i
                                                    class="fa-regular fa-pen-to-square"></i></button>
                                        </form>

                                    </td>
                                    <td>
                                        {{ number_format($item->price * $item->quantity, 0, ',', '.') }}₫
                                    </td>
                                    <td>
                                        <form action="{{ route('cart.remove') }}" method="POST">
                                            @csrf
                                            <input type="hidden" value="{{ $item->id }}" name="id">
                                            <button class="px-4 py-2 text-white btn-danger"><i
                                                    class="fa-solid fa-trash-can"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td>
                                    <div>
                                        Thành tiền: {{ number_format(Cart::getTotal(), 0, ',', '.') }}₫
                                    </div>
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>

                        </tbody>
                    </table>
                    <div>
                        <form action="{{ route('cart.clear') }}" method="POST">
                            @csrf
                            <button class="px-6 py-2 text-red-800 btn-danger">Xóa toàn bộ giỏ hàng</button>
                        </form>
                    </div>
                    <div class="checkout_btn_inner float-right">
                        <a class="btn_1" href="{{ route('index') }}">Tiếp tục mua hàng</a>
                        <a class="btn_1 checkout_btn_1" href="{{route('checkout')}}">Đi tới thanh toán</a>
                    </div>
                </div>
            </div>
    </section>
    <!--================End Cart Area =================-->
@endsection
