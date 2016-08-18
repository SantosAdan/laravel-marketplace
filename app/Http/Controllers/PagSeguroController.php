<?php

namespace Marketplace\Http\Controllers;

use Illuminate\Http\Request;

use Marketplace\Http\Requests;
use Marketplace\Http\Controllers\Controller;
use laravel\pagseguro\Platform\Laravel5\ServiceProvider;

class PagSeguroController extends Controller
{
    // /**
    //  * Display a listing of the resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function index()
    // {
    //     $data = [
    //         'items' => [
    //             [
    //                 'id' => '18',
    //                 'description' => 'Item Um',
    //                 'quantity' => '1',
    //                 'amount' => '1.15',
    //                 'weight' => '45',
    //                 'shippingCost' => '3.5',
    //                 'width' => '50',
    //                 'height' => '45',
    //                 'length' => '60',
    //             ],
    //             [
    //                 'id' => '19',
    //                 'description' => 'Item Dois',
    //                 'quantity' => '1',
    //                 'amount' => '3.15',
    //                 'weight' => '50',
    //                 'shippingCost' => '8.5',
    //                 'width' => '40',
    //                 'height' => '50',
    //                 'length' => '80',
    //             ],
    //         ],
    //         'shipping' => [
    //             'address' => [
    //                 'postalCode' => '06410030',
    //                 'street' => 'Rua Leonardo Arruda',
    //                 'number' => '12',
    //                 'district' => 'Jardim dos Camargos',
    //                 'city' => 'Barueri',
    //                 'state' => 'SP',
    //                 'country' => 'BRA',
    //             ],
    //             'type' => 2,
    //             'cost' => 30.4,
    //         ],
    //         'sender' => [
    //             'email' => 'sender@gmail.com',
    //             'name' => 'Isaque de Souza Barbosa',
    //             'documents' => [
    //                 [
    //                     'number' => '01234567890',
    //                     'type' => 'CPF'
    //                 ]
    //             ],
    //             'phone' => '11985445522',
    //             'bornDate' => '1988-03-21',
    //         ],
    //         'currency' => 'BRL'
    //     ];

    //    $checkout = \PagSeguro::checkout()->createFromArray($data);
    //    $credentials = \PagSeguro::credentials()->get();
    //     dd($checkout);

    //     $information = $checkout->send($credentials); // Retorna um objeto de laravel\pagseguro\Checkout\Information\Information
    //     if ($information) {
    //         print_r($information->getCode());
    //         print_r($information->getDate());
    //         print_r($information->getLink());
    //     }
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirect()
    {
        $id_pagseguro = $_GET['id_pagseguro'];
        $code = str_replace('-', '',$id_pagseguro);
        $credentials = \PagSeguro::credentials()->get();
        $transaction = \PagSeguro::transaction()->get($code, $credentials);
        $information = $transaction->getInformation();

        return redirect($information->link);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
