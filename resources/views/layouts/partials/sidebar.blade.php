<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        </li>
        <li class="treeview strpos(Request::url(), 'produtos') ? 'active' : ''">
          <a href="#">
            <i class="fa fa-bullhorn"></i> <span>Produtos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('products.index')}}"><i class="fa fa-circle-o"></i>Todos</a></li>
            <li><a href="{{route('products.user')}}"><i class="fa fa-circle-o"></i>Meus</a></li>
            <li>
              <a href="#"><i class="fa fa-circle-o"></i> Categorias
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{route('products.bycategory',['Eletrônicos'])}}"><i class="fa fa-circle-o"></i><span class="trunc"> Eletrônicos</span></a></li>
                <li><a href="{{route('products.bycategory',['Esportes'])}}"><i class="fa fa-circle-o"></i><span class="trunc"> Esportes</span></a></li>
                <li><a href="{{route('products.bycategory',['Vestuário'])}}"><i class="fa fa-circle-o"></i><span class="trunc"> Vestuário</span></a></li>
                <li><a href="{{route('products.bycategory',['Computadores e Smartphones'])}}"><i class="fa fa-circle-o"></i><span class="trunc"> Computadores e Smartphones</span></a></li>
                <li><a href="{{route('products.bycategory',['Arte e Artesanato'])}}"><i class="fa fa-circle-o"></i><span class="trunc"> Arte e Artesanato</span></a></li>
                <li><a href="{{route('products.bycategory',['Brinquedos'])}}"><i class="fa fa-circle-o"></i><span class="trunc"> Brinquedos</span></a></li>
                <li><a href="{{route('products.bycategory',['Livros, Revistas e Quadrinhos'])}}"><i class="fa fa-circle-o"></i><span class="trunc"> Livros, Revistas e Quadrinhos</span></a></li>
                <li><a href="{{route('products.bycategory',['Colecionáveis'])}}"><i class="fa fa-circle-o"></i><span class="trunc"> Colecionáveis</span></a></li>
                <li><a href="{{route('products.bycategory',['Outros'])}}"><i class="fa fa-circle-o"></i><span class="trunc"> Outros</span></a></li>
              </ul>
            </li>
          </ul>
        </li>
      <li>
          <a href="pages/widgets.html">
            <i class="fa fa-th"></i> <span>Pedidos</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Vendas</span>
          </a>
        </li>
    </section>
    <!-- /.sidebar -->
  </aside>