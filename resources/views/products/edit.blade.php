@extends('layouts.master')

@section('specific_styles')
    <link rel="stylesheet" href="/assets/js/dropzone/dist/min/dropzone.min.css">
@stop

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
<style type="text/css">
  .dz-message span {
    font-size: 30px;
  }
</style>
    <div class="container-fluid">
        <div class="row" style="margin-bottom: 3%">
            <div class="col-xs-12 col-md-10 col-md-offset-1">
                {!! Form::open(['method' => 'POST', 'route' => ['products.addPhoto', $product->id], 'id' => 'fileUploads', 'class' => 'form-horizontal dropzone', 'files' => true]) !!}
                    <div class="fallback">
                        {!! Form::file('file', null, ['multiple']) !!}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
      </div>

      <div class="row" style="padding-bottom: 3%">
          <div class="col-xs-12">
              {!! Form::model($product, ['route' => ['products.update',$product->id], 'files' => true, 'method' => 'PUT',
                  'class' => 'form-horizontal', 'id' => 'product-edit']) !!}
              @include('products/partials/_form')
              {!! Form::close() !!}
          </div>
      </div>
@stop

@section('specific_scripts')
    <script type="text/javascript" src="/assets/js/dropzone/dist/min/dropzone.min.js"></script>
@stop

@section('inline_scripts')
<script>
  $(document).ready(function() {

    Dropzone.options.fileUploads = {
        maxFilesize: 100, // in MB
        dictDefaultMessage: 'Arraste as fotos aqui ou clique para fazer o upload...',
    }

    // $(".textarea").wysihtml5();
  });
</script>
@stop