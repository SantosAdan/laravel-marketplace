@extends('layouts.master')

@section('header_title')
    <h1>
        <i class="fa ion-android-cart fa-fw fa-2x"></i>
        {{$product->name}}
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home fa-fw"></i> Home</a></li>
        <li><a href="{{ route('products.index') }}">Produtos</a></li>
        <li class="active">{{$product->name}}</li>
      </ol>
      </br>
@stop

@section('header_title')
<ol class="breadcrumb">
  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
  <li class="active">Anúncios</li>
</ol>
@stop

@section('content')
<div class="container-fluid">

  <div class="row">
    <div class="col-md-6 col-xs-12" style="background-color: white;">
      <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          @foreach($photos as $key => $photo)
          <li data-target="#carousel-example-generic" data-slide-to="{{ $key }}" class="{{$key == 0 ? 'active' : ''}}"></li>
          @endforeach
        </ol>
        <div class="carousel-inner">
          @foreach($photos as $key => $photo)
          <div class="item {{$key == 0 ? 'active' : ''}}">
            <img src="{{ route('images', [$photo->path, 300]) }}" alt="First slide">

            <div class="carousel-caption">
              &nbsp;
            </div>
          </div>
          @endforeach
        </div>
        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
          <span class="fa fa-angle-left"></span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
          <span class="fa fa-angle-right"></span>
        </a>
      </div>
    </div>

    <div class="col-md-6 col-xs-12">
      <a href="{{ route('products.bycategory', $product->category->name) }}"><span class="label bg-primary pull-right">{{ $product->category->name }}</span></a>
      <h3>Preço: <u>R$ {{ number_format($product->price, 2, ',', '.') }}</u></h3>
      <h4>Quantidade em estoque: {{$product->quantity}} unidades.</h4>

      <div class="col-md-6 col-md-offset-2 col-xs-12" style="margin-top: 5%;">
        {!! Form::open(['route' => ['orders.create', $product->id], 'method' => 'POST']) !!}
        <div class="input-group">
          <input type="number" name="quantity" class="form-control" placeholder="Quantidade">
          <span class="input-group-btn">
            <button class="btn btn-primary" type="submit"><i class="fa fa-money"></i> Comprar</button>
          </span>
        </div><!-- /input-group -->
        {!! Form::close() !!}
      </div>
    </div>
  </div>
  <!-- /.row -->
  <br><br><br>

  <div class="row">
    <div class="col-md-12 col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <i class="fa fa-list"></i>
          <h3 class="box-title">Detalhes</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          {!! $product->description !!}
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row -->
</div>
@stop