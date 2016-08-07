@extends('layouts.master')
@section('header_title')
    <h1>
        <i class="fa fa-plus"></i>
        Editar Produto
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Produtos</li>
        <li class="active">Editar Produto</li>
      </ol>
      </br>
@stop

@section('content')
    <div class="container-fluid">
      <div class="row">
          <div class="col-xs-12">
              {!! Form::model($product, ['route' => ['products.update',$product->id], 'files' => true, 'method' => 'PUT',
                  'class' => 'form-horizontal', 'id' => 'product-edit']) !!}
              @include('products/partials/_form')
              {!! Form::close() !!}
          </div>
      </div>
    </div>
@stop

@section('inline_scripts')
<script>
  $(document).ready(function() {
    $(".textarea").wysihtml5();
  });
</script>
@stop