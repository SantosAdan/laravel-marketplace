@extends('layouts.master')

@section('header_title')
    <h1>
        <i class="fa fa-bullhorn"></i>
        Anúncios
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Anúncios</li>
      </ol>
      </br>
      <a href="{{route('criar_anuncio')}}" class="btn btn-sm btn-primary">
          <i class="fa fa-plus"></i>
           Criar Anúncio
      </a>
@stop

@section('content')
@stop