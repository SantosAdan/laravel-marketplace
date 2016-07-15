@extends('layouts.master')

@section('header_title')
<ol class="breadcrumb">
  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
  <li class="active">Anúncios</li>
</ol>
@stop

@section('content')
<div class="container-fluid">

  <h3>
    Nome: {{$product->name}}
  </h3>
  <h3>
    Preço por unidade: {{$product->price}}
  </h3>
  <h3>
    Quantidade: {{$product->quantity}}
  </h3>

   <section class="row" style="margin-top: 2%; margin-right: 1%;">
    @foreach($photos as $photo)
    <div class="col-md-4">
        <a href="#">
          <div class="box box-solid">

            <div class="box-body no-padding" style="
                        background-image: url({{ route('images', [$photo->path, 170]) }});
                        background-size: cover;
                        background-repeat: no-repeat;
                        background-position: 50% 50%;
                        min-height: 170px;
            ">
            </div>
         </a>
    </div>
    @endforeach
  </section>

  <section class="row" style="margin-top: 2%; margin-left: 1%;">
    <a href="" class="btn btn-xs btn-flat btn-primary pull-left">
        <i class="fa fa-money"></i> <b>Comprar Produto</b>
    </a>
  </section>




</div>
@stop