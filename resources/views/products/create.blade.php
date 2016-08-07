@extends('layouts.master')
@section('header_title')
    <h1>
        <i class="fa fa-plus"></i>
        Criar Anúncio
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Anúncios</li>
        <li class="active">Criar Anúncio</li>
      </ol>
      </br>
@stop

@section('content')
    <div class="container-fluid">
      <div class="row">
          <div class="col-xs-12">
              {!! Form::model(new \Marketplace\Product, ['route' => 'products.store', 'files' => true,
                  'class' => 'form-horizontal', 'id' => 'product-create']) !!}
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