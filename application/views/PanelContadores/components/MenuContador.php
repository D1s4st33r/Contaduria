
<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
  <a class="navbar-brand mr-auto mr-lg-0 text-white" > 
    <i class='fas fa-user-tie fa-lg'></i></a>
  <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto ">
      <li class="nav-item <?php echo ( isset($menu) && !empty($menu) && ($menu == "Panel") ) ? "active" : "" ; ?> p-1">
        <a class="nav-link" href="<?php echo base_url("Contador");echo $session;?>"> 
          <i class='fas fa-desktop fa-lg'></i><small> Panel </small>
        </a>
      </li>
      <li class="nav-item <?php echo ( isset($menu) && !empty($menu) && ($menu == "Clientes") ) ? "active" : "" ; ?> p-1">
        <a class="nav-link" href="<?php echo base_url("ContadorCliente").$session;?>"> 
          <i class='fas fa-user fa-lg'></i> <small> Clientes &amp; Empresas</small>
          </a>
      </li>

      <li class="nav-item <?php echo ( isset($menu) && !empty($menu) && ($menu == "Boveda") ) ? "active" : "" ; ?> p-1">
        <a class="nav-link" href="<?php echo base_url("BovedaContador").$session;?>">
          <i class='fas fa-suitcase fa-lg'></i> <small> Boveda</small>
          </a>
      </li>
      <!-- <li class="nav-item p-1">
        <a class="nav-link" href="<?php echo base_url("ConfPreguntas");echo $session;?>"> 
        <i class='fas fa-question fa-lg'></i> <small>Cuestionarios</small>
        </a> -->
      </li>
    </ul>
    <button 
        class="btn btn-outline-warning my-2 my-sm-0"
        onclick="CerrarSesion('<?php echo base_url('CerrarSesion').$session;?>')"
        >Cerrar Sesion</button>
  </div>
</nav>