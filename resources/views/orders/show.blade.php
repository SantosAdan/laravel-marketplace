@extends('layouts.master')
@section('header_title')
    <h1>
        <i class="fa fa-list"></i>
        Pedido #{{ $order->id }}
      </h1>
      <ol class="breadcrumb">
        <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('orders.myOrders') }}"><i class="fa fa-shopping-cart"></i> Meus Pedidos</a></li>
        <li class="active">Pedido #{{ $order->id }}</li>
      </ol>
      </br>
@stop

@section('content')
  <div class="container-fluid">
    <div class="row">

      <div class="col-md-8 col-xs-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <i class="fa fa-list"></i>

            <h3 class="box-title">{{ $order->product->name }}</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <p>Valor: R$ {{ number_format($order->product->price, 2, ',', '.') }}</p>
            <p>Quantidade: {{ $order->getQuantity() }}</p>
            <p>Status do pedido: <span class="label bg-green">{{ $order->status }}</span></p>
            <div class="progress progress-sm active">
              <div class="progress-bar progress-bar-primary progress-bar-striped" role="progressbar" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100" style="width: 33%">
                <span class="sr-only">33% Complete</span>
              </div>
            </div>
            {{-- <h4>Descrição</h4>
            <hr>
            <div>{!! $order->product->description !!}</div> --}}
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <p class="pull-right" style="font-size: 1.3em;">
              <span class="label bg-red">Total: R$ {{ number_format($order->total, 2, ',', '.') }}</span>
            </p>
          </div>
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->

      <div class="col-md-4 col-xs-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <i class="fa fa-user"></i>

            <h3 class="box-title">Dados do Vendedor</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <p>Nome: {{ $order->seller->name }}</p>
            <p>Email: {{ $order->seller->email }}</p>
            <p>Membro desde: {{ $order->created_at->format('M. Y') }}</p>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
          </div>
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->

    </div>
  </div>
@stop

@section('inline_scripts')
<script>
  $(document).ready(function() {

  });
</script>
@stop
