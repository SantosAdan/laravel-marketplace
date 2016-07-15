<!-- Category Details Form Input -->
<div class="form-group">
    <div class="row">
        <label class="col-xs-3 control-label">Categoria<sup style="color: red;">*</sup></label>
        <div class="col-xs-7">
            {!! Form::select('category_id', [1 => 'Categoria Exemplo', 2 => 'Categoria Exemplo 2'], null, ['class' => 'form-control input-sm', 'placeholder' => 'Selecionar Categoria']) !!}
        </div>
    </div>
</div>

<!-- Name Form Input -->
<div class="form-group">
    <div class="row">
        <label class="col-xs-3 control-label">Nome<sup style="color: red;">*</sup></label>
        <div class="col-xs-7">
            {!! Form::text('name', null, ['class' => 'form-control input-sm', 'placeholder' => 'Nome do produto']) !!}
        </div>
    </div>
</div>

<!-- Price Form Input -->
<div class="form-group">
    <div class="row">
        <label class="col-xs-3 control-label">Preço<sup style="color: red;">*</sup></label>
        <div class="col-xs-7">
            {!! Form::text('price', null, ['class' => 'form-control input-sm', 'placeholder' => 'Preço do produto (R$)']) !!}
        </div>
    </div>
</div>

<!-- Quantity Form Input -->
<div class="form-group">
    <div class="row">
        <label class="col-xs-3 control-label">Quantidade<sup style="color: red;">*</sup></label>
        <div class="col-xs-7">
            {!! Form::number('quantity', null, ['class' => 'form-control input-sm', 'placeholder' => 'Quantidade em estoque']) !!}
        </div>
    </div>
</div>

<!-- Description Form Input -->
<div class="form-group">
    <div class="row">
        <label class="col-xs-3 control-label">Descrição</label>
        <div class="col-xs-7">
            <div class="box">
              <div class="box-body pad">
                  <textarea name="description" class="textarea" placeholder="Descreve detalhadamente sua oferta..." style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
              </div>
            </div>
        </div>
    </div>
</div>

<div class="clearfix">
    <div class="col-xs-offset-5 col-xs-4">
        <button class="btn btn-success btn-flat" type="submit">
            <i class="fa fa-save"></i>
            Salvar
        </button>

        &nbsp; &nbsp; &nbsp;
        <a class="btn btn-default btn-flat" href="{{Request::server('HTTP_REFERER')}}">
            <i class="fa fa-undo"></i>
            Voltar
        </a>
    </div>
</div>