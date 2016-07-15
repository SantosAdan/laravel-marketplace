@extends('layouts.master')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Meus Dados
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Meus Dados</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="{{ route('images', [Auth::user()->photo_url, 128]) }}" alt="User profile picture">

              <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>

              <p class="text-muted text-center">Membro desde {{ Auth::user()->created_at->format('M. Y') }}</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Meus Pedidos</b> <a class="badge pull-right">{{ count(Auth::user()->orders) }}</a>
                </li>
                <li class="list-group-item">
                  <b>Meus Anúncios</b> <a class="badge pull-right">{{ count(Auth::user()->advertisement) }}</a>
                </li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->

        <!-- Data Section -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#settings" data-toggle="tab">Dados</a></li>
              <li><a href="#activity" data-toggle="tab">Endereço</a></li>
            </ul>

            <div class="tab-content">
              <div class="tab-pane" id="activity">
                {!! Form::model($user, ['method' => 'PUT', 'route' => 'user.update', 'class' => 'form-horizontal']) !!}
                    <!-- Street Form Input -->
                    <div class="form-group">
                      <label for="inputStreet" class="col-sm-2 control-label">Endereço</label>
                      <div class="col-sm-7">
                        {!! Form::text('street', null, ['class' => 'form-control', 'id' => 'inputStreet', 'placeholder' => 'Rua']) !!}
                      </div>
                      <div class="col-sm-3">
                        {!! Form::number('street_number', null, ['class' => 'form-control', 'id' => 'inputStreetNumber', 'placeholder' => 'Número']) !!}
                      </div>
                    </div>

                    <!-- District Form Input -->
                    <div class="form-group">
                      <label for="inputDistrict" class="col-sm-2 control-label">Bairro</label>
                      <div class="col-sm-10">
                        {!! Form::text('district', null, ['class' => 'form-control', 'id' => 'inputDistrict', 'placeholder' => 'Bairro']) !!}
                      </div>
                    </div>

                    <!-- State Form Input -->
                    <div class="form-group">
                      <label for="inputState" class="col-sm-2 control-label">Estado</label>
                      <div class="col-sm-10">
                        {!! Form::text('state', null, ['class' => 'form-control', 'id' => 'inputState', 'placeholder' => 'Estado']) !!}
                      </div>
                    </div>

                    <!-- City Form Input -->
                    <div class="form-group">
                      <label for="inputCity" class="col-sm-2 control-label">Cidade</label>
                      <div class="col-sm-10">
                        {!! Form::text('city', null, ['class' => 'form-control', 'id' => 'inputCity', 'placeholder' => 'Cidade']) !!}
                      </div>
                    </div>

                    <!-- ZipCode Form Input -->
                    <div class="form-group">
                      <label for="inputZipCode" class="col-sm-2 control-label">CEP</label>
                      <div class="col-sm-10">
                        {!! Form::text('zipcode', null, ['class' => 'form-control', 'id' => 'inputZipCode', 'placeholder' => 'CEP']) !!}
                      </div>
                    </div>

                    <!-- Submit Form Button -->
                    <div class="form-group">
                      <div class="col-sm-4 col-sm-offset-5">
                        <button class="btn btn-danger" type="submit">
                            <b><i class="fa fa-save fa-fw"></i> Salvar</b>
                        </button>
                      </div>
                    </div>
                {!! Form::close() !!}
              </div>
              <!-- /.tab-pane -->

              <div class="active tab-pane" id="settings">
                {!! Form::model($user, ['method' => 'PUT', 'route' => 'user.update', 'class' => 'form-horizontal', 'files' => true]) !!}
                    <div class="form-group">
                      <label for="inputPhoto" class="col-sm-2 control-label">Foto</label>
                      <div class="col-sm-10">
                        {!! Form::file('photo_url', null, ['class' => 'form-control', 'id' => 'inputPhoto']) !!}
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputName" class="col-sm-2 control-label">Nome</label>
                      <div class="col-sm-10">
                        {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'inputName', 'placeholder' => 'Nome']) !!}
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputPassword" class="col-sm-2 control-label">Senha</label>
                      <div class="col-sm-10">
                        {!! Form::password('password', ['class' => 'form-control', 'id' => 'inputPassword', 'placeholder' => 'Senha']) !!}
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputPasswordConfirmation" class="col-sm-2 control-label">Confirmar Senha</label>
                      <div class="col-sm-10">
                        {!! Form::password('password_confirmation', ['class' => 'form-control', 'id' => 'inputPasswordConfirmation', 'placeholder' => 'Confirmar Senha']) !!}
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-sm-4 col-sm-offset-5">
                        <button class="btn btn-danger" type="submit">
                            <b><i class="fa fa-save fa-fw"></i> Salvar</b>
                        </button>
                      </div>
                    </div>
                {!! Form::close() !!}
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
@stop