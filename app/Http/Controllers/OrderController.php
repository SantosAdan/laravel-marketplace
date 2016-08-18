<?php

namespace Marketplace\Http\Controllers;

use Marketplace\Order;
use Marketplace\Product;
use Illuminate\Http\Request;
use Marketplace\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Marketplace\Http\Controllers\Controller;
use laravel\pagseguro\Platform\Laravel5\ServiceProvider;

class OrderController extends Controller
{
    /**
     * Display the listing of orders where the user is buying.
     *
     * @return \Illuminate\Http\Response
     */
    public function getMyOrders()
    {
        $orders = Order::with('buyer', 'seller', 'product')->where('buyer_id', Auth::user()->id)->get();

        return view('orders.myOrders', compact('orders'));
    }

    /**
     * Display the listing of orders where the user is selling.
     *
     * @return \Illuminate\Http\Response
     */
    public function getMySales()
    {
        $orders = Order::with('buyer', 'seller', 'product')->where('seller_id', Auth::user()->id)->get();

        return view('orders.mySales', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $productId)
    {
        $product = Product::findOrFail($productId);
        $quantity = $request['quantity'];

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
        $inputs['quantity'] = $request['quantity'];
        $inputs['status'] = 0;

        $order = Order::create($inputs);

        if($order) {
            $product->quantity -= $request['quantity'];
            $product->save();
        }

        $data = [
                'items' => [
                     [
                         'id' => (string)$order->id,
                         'description' => $order->product->name,
                         'quantity' => (string)$order->quantity,
                         'amount' => (string)$order->product->price,
                          'weight' => '45',
                            'shippingCost' => '3.5',
                            'width' => '50',
                            'height' => '45',
                            'length' => '60'
                     ]
                ],
                  'shipping' => [
                    'address' => [
                        'postalCode' => $order->buyer->zipcode,
                        'street' => $order->buyer->street,
                        'number' => $order->buyer->street_number,
                        'district' => $order->buyer->district,
                        'city' => $order->buyer->city,
                        'state' => $order->buyer->state,
                        'country' => 'BRA'
                    ],
                    'cost' => null,
                    'type' => 3,
                ],
                'sender' => [
                    // 'email' => $order->buyer->email,
                    // 'name' => $order->buyer->name,
                    // 'documents' => [
                    //     [
                    //         'number' => '01234567890',
                    //         'type' => 'CPF'
                    //     ]
                    // ],
                    // 'phone' => '11985445522',
                    // 'bornDate' => '1988-03-21',
                    //  'sender' => [
                    'email' => 'sender@gmail.com',
                    'name' => 'Isaque de Souza Barbosa',
                    'documents' => [
                        [
                            'number' => '01234567890',
                            'type' => 'CPF'
                        ]
                    ],
                    'phone' => '11985445522',
                    'bornDate' => '1988-03-21',
                ],
                'currency' => 'BRL'
        ];

        $checkout = \PagSeguro::checkout()->createFromArray($data);
        $credentials = \PagSeguro::credentials()->get();
        // $information = $checkout->send($credentials); // Retorna um objeto de laravel\pagseguro\Checkout\Information\Information
        $information = $checkout->send($credentials);

        if ($information) {
            // dd($information);
            // print_r($information->getCode());
            // print_r($information->getDate());
            $link = $information->getLink();
            return redirect($link);
        }

        return redirect()->route('orders.show', $order->id);
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
