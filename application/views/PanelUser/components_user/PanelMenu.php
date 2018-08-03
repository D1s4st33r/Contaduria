
<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
  <a class="navbar-brand mr-auto mr-lg-0 text-white" > 
  <?php 
        if($usuario['tipo'] == "Administrador"){
          echo "<i class='fas fa-user-shield fa-lg'></i>";
        }
        if($usuario['tipo'] == "Contadores"){
          echo "<i class='fas fa-user-tie fa-lg'></i>";
        }
        if($usuario['tipo'] == "Cliente"){
          echo "<i class='fas fa-user fa-lg'></i>";
        }
      ?>
  </a>
  <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto ">
      <li class="nav-item <?php echo ( isset($menu) && !empty($menu) && ($menu == "Panel") ) ? "active" : "" ; ?> p-1">
        <a class="nav-link" href="<?php echo base_url("Cliente");echo $session;?>"> 
          <i class='fas fa-desktop fa-lg'></i><small> Perfil </small>
        </a>
      </li>
      <li class="nav-item <?php echo ( isset($menu) && !empty($menu) && ($menu == "Documentos") ) ? "active" : "" ; ?> p-1">
        <a class="nav-link" href="<?php echo base_url("ControlEmpresas");echo $session;?>">
          <i class='fas fa-building'></i> <small>Empresas</small>
        </a>
      </li>
      
    </ul>
    <!-- <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form> -->
  </div>
</nav>