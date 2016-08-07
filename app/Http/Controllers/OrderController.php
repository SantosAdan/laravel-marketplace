<?php

namespace Marketplace\Http\Controllers;

use Marketplace\Order;
use Marketplace\Product;
use Illuminate\Http\Request;
use Marketplace\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Marketplace\Http\Controllers\Controller;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::with('buyer', 'seller')->where('buyer_id', Auth::user()->id)->get();

        return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($productId)
    {
        $product = Product::findOrFail($productId);
        $quantity = 2;

        return view('orders.create', compact('product', 'quantity'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $productId)
    {
        $inputs = $request->all();
        $product = Product::findOrFail($productId);
        $inputs['product_id'] = $product->id;
        $inputs['seller_id'] = $product->user->id;
        $inputs['buyer_id'] = Auth::user()->id;
        $inputs['total'] = $product->price * intval($request['quantity']);
        $inputs['status'] = 'Aguardando Pagamento';

        $order = Order::create($inputs);

        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($orderId)
    {
        $order = Order::findOrFail($orderId);

        return view('orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
}
