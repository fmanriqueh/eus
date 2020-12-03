<div class='nav-container'>
  <nav class="navbar">
    {{-- <div class="container-fluid"> --}}
      <div class="upper">
        <div class="brand">
          <a href="{{ url('/') }}"><img src={{ asset('logo/logo-eus-horizontal.png') }}></a>
          
        </div>
        <form id="query-form" action="{{ route('search') }}" style="display: flex;width:70%">
          <div class="search">
            <input id="query" name="query" type="text" class="search-textbox" placeholder="Buscar" required value=""> 
            <a href="javascript:{}" onclick="document.getElementById('query-form').submit();"class="ico-btn search-btn"><i class="material-icons ic_search">&#xE8B6;</i></a>
            <a href="javascript:{}" onclick="document.getElementById('query').value = '';" class="ico-btn clear-btn"><i class="material-icons ic_clear">&#xE14C;</i></a>
          </div>
        </form>
        <div class="utilities">
          <ul>
            <li id="account" class="utility">
              <a class="" href="{{ route('login') }}">
                <svg class="" width="25" height="100%" viewBox="0 0 24 24">
                  <path d="M12,4A4,4 0 0,1 16,8A4,4 0 0,1 12,12A4,4 0 0,1 8,8A4,4 0 0,1 12,4M12,14C16.42,14 20,15.79 20,18V20H4V18C4,15.79 7.58,14 12,14Z"></path>
                </svg> 
              </a>
            </li>
            <li id="shopping-bag" class="utility">
              <a class="" href="/cart">
                <svg width="25" height="100%" viewBox="0 0 24 24">
                  <path d="M17,18C15.89,18 15,18.89 15,20A2,2 0 0,0 17,22A2,2 0 0,0 19,20C19,18.89 18.1,18 17,18M1,2V4H3L6.6,11.59L5.24,14.04C5.09,14.32 5,14.65 5,15A2,2 0 0,0 7,17H19V15H7.42A0.25,0.25 0 0,1 7.17,14.75C7.17,14.7 7.18,14.66 7.2,14.63L8.1,13H15.55C16.3,13 16.96,12.58 17.3,11.97L20.88,5.5C20.95,5.34 21,5.17 21,5A1,1 0 0,0 20,4H5.21L4.27,2M7,18C5.89,18 5,18.89 5,20A2,2 0 0,0 7,22A2,2 0 0,0 9,20C9,18.89 8.1,18 7,18Z">
                </svg>
                <p>0</p>
              </a>
            </li>
          </ul>
        </div>
      </div>
      <div class="navbar-bottom">
        <ul>
          <li><a id="entrepreneurs" href="/entrepreneurs">Emprendedores</a></li>
          <li><a id="brands" href="/brands">Marcas</a></li>
          <li><a id="products" href="/products">Productos</a></li>
        </ul>
      </div>
  
      {{--  For search thing  --}}
        {{-- <form class="form-inline my-2 my-lg-0"> --}}
          
          {{-- <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button> --}}
        {{-- </form> --}}
      
    {{-- </div> --}}
  </nav>
</div>
