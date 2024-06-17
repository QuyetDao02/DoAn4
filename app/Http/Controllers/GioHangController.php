<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoaiDoNoiThat;

class GioHangController extends Controller
{
    public function cartList()
    {
        $ldnt = LoaiDoNoiThat::all();
        $cartItems = \Cart::getContent();
        // dd($cartItems);
        return view('Home/cart', ['cartItems'=>$cartItems],['LoaiDoNoiThat' => $ldnt]);
    }


    public function addToCart(Request $request)
    {
        \Cart::add([
            'id' => $request->id,
            'name' => $request->TenDNT,
            'price' => $request->GiaBan,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->HinhAnh,
            )
        ]);
        session()->flash('success', 'Product is Added to Cart Successfully !');

        return redirect()->route('cart.list');
    }

    public function updateCart(Request $request)
    {
        \Cart::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );

        session()->flash('success', 'Item Cart is Updated Successfully !');

        return redirect()->route('cart.list');
    }

    public function removeCart(Request $request)
    {
        \Cart::remove($request->id);
        session()->flash('success', 'Item Cart Remove Successfully !');

        return redirect()->route('cart.list');
    }

    public function clearAllCart()
    {
        \Cart::clear();

        session()->flash('success', 'All Item Cart Clear Successfully !');

        return redirect()->route('cart.list');
    }
}
