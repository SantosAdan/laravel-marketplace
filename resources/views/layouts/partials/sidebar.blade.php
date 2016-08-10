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
        <li>
          <a href="#">
            <i class="fa fa-home fa-fw"></i> <span>Home</span>
          </a>
        </li>
        <li class="treeview strpos(Request::url(), 'produtos') ? 'active' : ''">
          <a href="#">
            <i class="fa fa-bullhorn fa-fw"></i> <span>Produtos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('products.index')}}"><i class="fa ion-ios-circle-filled fa-fw text-green"></i>Todos</a></li>
            <li><a href="{{route('products.user')}}"><i class="fa ion-ios-circle-outline fa-fw text-blue"></i>Meus Produtos</a></li>
            <li>
              <a href="#"><i class="fa ion-ios-pricetags fa-fw"></i> Categorias
                <span class="pull-right-container">
                  <i class="fa fa-angle-left fa-fw pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li>
                  <a href="{{route('products.bycategory',['Eletrônicos'])}}">
                    {{-- <i class="fa fa-circle-o fa-fw"></i> --}}
                    <span> Eletrônicos</span>
                  </a>
                </li>
                <li>
                  <a href="{{route('products.bycategory',['Esportes'])}}">
                    {{-- <i class="fa fa-circle-o fa-fw"></i> --}}
                    <span> Esportes</span>
                  </a>
                </li>
                <li>
                  <a href="{{route('products.bycategory',['Vestuário'])}}">
                    {{-- <i class="fa fa-circle-o fa-fw"></i> --}}
                    <span> Vestuário</span>
                  </a>
                </li>
                <li>
                  <a href="{{route('products.bycategory',['Computadores e Smartphones'])}}">
                    {{-- <i class="fa fa-circle-o fa-fw"></i> --}}
                    <span class="trunc"> Computadores e Smartphones</span>
                  </a>
                </li>
                <li>
                  <a href="{{route('products.bycategory',['Arte e Artesanato'])}}">
                    {{-- <i class="fa fa-circle-o fa-fw"></i> --}}
                    <span> Arte e Artesanato</span>
                  </a>
                </li>
                <li>
                  <a href="{{route('products.bycategory',['Brinquedos'])}}">
                    {{-- <i class="fa fa-circle-o fa-fw"></i> --}}
                    <span> Brinquedos</span>
                  </a>
                </li>
                <li>
                  <a href="{{route('products.bycategory',['Livros, Revistas e Quadrinhos'])}}">
                    {{-- <i class="fa fa-circle-o fa-fw"></i> --}}
                    <span class="trunc"> Livros, Revistas e Quadrinhos</span>
                  </a>
                </li>
                <li>
                  <a href="{{route('products.bycategory',['Colecionáveis'])}}">
                    {{-- <i class="fa fa-circle-o fa-fw"></i> --}}
                    <span> Colecionáveis</span>
                  </a>
                </li>
                <li>
                  <a href="{{route('products.bycategory',['Outros'])}}">
                    {{-- <i class="fa fa-circle-o fa-fw"></i> --}}
                    <span> Outros</span>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </li>
        <li class="{{ strpos(Request::url(), 'meus') ? 'active' : '' }}">
          <a href="{{ route('orders.myOrders') }}">
            <i class="fa ion-android-cart fa-fw"></i> <span>Meus Pedidos</span>
          </a>
        </li>
        <li class="{{ strpos(Request::url(), 'vendas') ? 'active' : '' }}"">
          <a href="{{ route('orders.mySales') }}">
            <i class="fa ion-ios-list fa-fw"></i> <span>Minhas Vendas</span>
          </a>
        </li>
    </section>
    <!-- /.sidebar -->
  </aside>