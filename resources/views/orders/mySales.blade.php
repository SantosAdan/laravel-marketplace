@extends('layouts.master')
@section('header_title')
    <h1>
        <i class="fa ion-ios-list fa-fw fa-2x"></i>
        Minhas Vendas
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home fa-fw"></i> Home</a></li>
        <li class="active">Minhas Vendas</li>
      </ol>
      </br>
@stop

@section('content')
<style type="text/css">
  .info-box-icon-img {
    height: 120px !important;
    width: 120px !important;
    line-height: 110px !important;
  }
  a {
    color:#000;
  }
</style>
    <div class="container-fluid">
      <div class="row">
        @if($orders->isEmpty())
            <div class="col-md-12 col-sm-6 col-xs-12">
              <div class="callout callout-info">
               <h4>Você ainda não realizou nenhuma compra venda.</h4>

               <p><a href="{{ route('products.create') }}">Comece a vender agora!</a></p>
             </div>
         </div>
         @else
            @foreach($orders as $order)
              <a href="{{ route('orders.show', $order->id) }}">
                <div class="col-md-12 col-sm-6 col-xs-12">
                  <div class="info-box" style="min-height: 120px !important;">
                    <span class="info-box-icon bg-aqua info-box-icon-img" style="
                          background-image: url({{ route('images', [$order->product->photos->first()->path, 120]) }});
                          background-size: cover;
                          background-repeat: no-repeat;
                          background-position: 50% 50%;
                          min-height: 120px;">
                      {{-- <img src="{{ route('images', [$order->product->photos->first()->path, 120])}}" > --}}
                    </span>

                    <div class="info-box-content" style="margin-left: 120px !important;">
                      <span class="info-box-text pull-right">
                        <span class="label bg-red" style="font-size: 0.7em;">Pedido #{{ $order->id }}</span>
                      </span>
                      <span class="info-box-text" style="font-size: 1.2em; font-weight: 800;">{{ $order->product->name }}</span>
                      <span class="info-box-text">Preço Unitário: R$ {{ number_format($order->product->price, 2, ',', '.') }}</span>
                      <span class="info-box-text">Quantidade: {{ $order->getQuantity() }}</span>
                      <span class="info-box-text">Comprador: {{ $order->buyer->name }}</span>
                      <span>
                        <span class="label bg-green">{{ $order->status }}</span>
                      </span>
                      <span class="info-box-number pull-right">R$ {{ number_format($order->total, 2, ',', '.') }}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
              </a>
              <!-- /.col -->
            @endforeach
        @endif
      </div>
    </div>
@stop

@section('inline_scripts')
<script>
  $(document).ready(function() {

  });
</script>
@stop
