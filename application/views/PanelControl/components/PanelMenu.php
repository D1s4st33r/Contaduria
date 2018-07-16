
<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
      <a class="navbar-brand mr-auto mr-lg-0 text-white" > <i class='fas fa-user-shield fa-lg'></i></a>
      <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto ">
          <li class="nav-item <?php echo ( isset($menu) && !empty($menu) && ($menu == "Panel") ) ? "active" : "" ; ?> p-1">
            <a class="nav-link" href="<?php echo base_url("PanelDeControl");echo $session;?>"> 
              <i class='fas fa-desktop fa-lg'></i><small> Panel </small>
            </a>
          </li>
          <li class="nav-item <?php echo ( isset($menu) && !empty($menu) && ($menu == "Contadores") ) ? "active" : "" ; ?> p-1">
            <a class="nav-link" href="<?php echo base_url("ControlContadores");echo $session;?>">
             <i class='fas fa-user-tie fa-lg'></i> <small>Contadores</small>
            </a>
          </li>
          <li class="nav-item <?php echo ( isset($menu) && !empty($menu) && ($menu == "Clientes") ) ? "active" : "" ; ?> p-1">
            <a class="nav-link" href="<?php echo base_url("ClientesAdmin").$session;?>"> 
              <i class='fas fa-user fa-lg'></i> <small> Clientes</small>
             </a>
          </li>

          <li class="nav-item p-1">
            <a class="nav-link" href="#">
              <i class='fas fa-suitcase fa-lg'></i> <small> Boveda</small>
              </a>
          </li>

        <!--   <li class="nav-item p-1">
            <a class="nav-link" href="<?php echo base_url("Formularios/contable");echo $session;?>">Contables </a>
          </li> -->
          <li class="nav-item dropdown p-1">
            <a class="nav-link dropdown-toggle" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
              <i class='fas fa-cog fa-lg'></i> <small>Configuraciones</small>
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="<?php echo base_url("ConfPreguntas");echo $session.'&cat=ind';?>"> Questionarios</a>
              <a class="dropdown-item" href="#">Another action</a>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>