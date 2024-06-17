@extends('Home/layout')
@section('content')
    <!--================Checkout Area =================-->
    <section class="checkout_area padding_top">
        <div class="container">
           
            <div class="billing_details">
                <div class="row">
                    <form class="row contact_form" action="{{ route('ThanhToan.store') }}" method="post"
                        novalidate="novalidate" enctype="multipart/form-data">
                        @csrf
                        <div class="col-lg-4">
                            <h3>Thông tin</h3>
                            {{-- <div class="col-md-12 form-group">
                                <select name="MaKH" class="form-control">
                                    @foreach ($kh as $item)
                                        <option value="{{ $item->MaKH }}">{{ $item->TenKH }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control" id="last" name="name" />
                                <span class="placeholder" data-placeholder="Last name"></span>
                            </div> --}}
                            <div class="col-md-12 form-group p_star">
                                <select name="MaKH" class="country_select">
                                    @foreach ($kh as $item)
                                        <option value="{{ $item->MaKH }}">{{ $item->TenKH }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" placeholder="Địa chỉ giao" name="DiaChi" />
                            </div>
                            <div class="col-md-12 form-group p_star">
                              <textarea name="GhiChu" id="" cols="30" class="form-control" placeholder="Ghi chú" rows="100%"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="order_box">
                                <h2>Thông tin đơn hàng</h2>
                                <ul class="list">
                                    <li>
                                        <a href="#">Sản phẩm
                                            <span>Giá</span>
                                        </a>
                                    </li>
                                    @foreach ($cartItems as $item)
                                        <li>
                                            <a href="#">{{ $item->name }}
                                                <span class="middle">x{{ $item->quantity }}</span>
                                                <span
                                                    class="last">{{ number_format($item->price * $item->quantity, 0, ',', '.') }}₫</span>
                                            </a>
                                        </li>
                                    @endforeach

                                </ul>
                                <ul class="list list_2">
                                    <li>
                                        <a href="#">Tổng tiền
                                            <span>{{ number_format(Cart::getTotal(), 0, ',', '.') }}₫</span>
                                        </a>
                                    </li>
                                </ul>
   
                                <div class="creat_account">
                                    <input type="checkbox" id="f-option4" name="selector" />
                                    <label for="f-option4">I’ve read and accept the </label>
                                    <a href="#">terms & conditions*</a>
                                </div>
                                <button type="submit" class="btn_3" href="#">Thanh toán</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--================End Checkout Area =================-->
@endsection
