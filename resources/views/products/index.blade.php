@extends('layouts.master')

@section('header_title')
    <h1>
        <i class="fa fa-bullhorn"></i>
        Produtos a Venda
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Anúncios</li>
      </ol>
      </br>
      <a href="{{route('product.create')}}" class="btn btn-sm btn-primary">
          <i class="fa fa-plus"></i>
           Anunciar Novo Produto
      </a>
@stop

@section('content')
@stop