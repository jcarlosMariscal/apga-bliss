<!-- Sidebar -->
<!-- <div id="vue-sidebar"> -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php?espacio=<?php echo $_SESSION['espacio']; ?>&view=inicio">
    <div class="">
      <img src="./assets/img/icon.png" width="35" height="35" class=''>
    </div>
    <div class="sidebar-brand-text mx-3">Apga <sup>Bliss</sup></div>
  </a>
  
  <!-- Divider -->
  <hr class="sidebar-divider my-0">
  <!-- Nav Item - Dashboard -->
  <li class="nav-item <?php echo ($view == 'inicio') ? 'active' : '' ;  ?>">
    <a class="nav-link" href="index.php?espacio=<?php echo $_SESSION['espacio']; ?>&view=inicio">
      <i class='bx bx-home nav_icon'></i>
      <span>Inicio</span>
    </a>
  </li>
  <!-- Divider -->
  <hr class="sidebar-divider">
  <!-- Heading -->
  <div class="sidebar-heading">Vistas Principales</div>
  <!-- Nav Item - Ingresos -->
  <li class="nav-item <?php echo ($view == 'ingresos') ? 'active' : '' ;  ?>">
    <a class="nav-link" href="index.php?espacio=<?php echo $_SESSION['espacio']; ?>&view=ingresos">
      <i class='bx bx-dollar-circle nav_icon'></i>
      <span>Ingresos</span>
    </a>
  </li>
  <!-- Nav Item - Gastos -->
  <li class="nav-item <?php echo ($view == 'gastos') ? 'active' : '' ;  ?>">
    <a class="nav-link" href="index.php?espacio=<?php echo $_SESSION['espacio']; ?>&view=gastos">
      <i class='bx bx-credit-card nav_icon'></i>
      <span>Gastos</span>
    </a>
  </li>
  <!-- Nav Item - Espacios -->
  <li class="nav-item <?php echo ($view == 'espacios') ? 'active' : '' ;  ?>">
    <a class="nav-link" href="index.php?espacio=<?php echo $_SESSION['espacio']; ?>&view=espacios">
      <i class='bx bx-customize nav_icon'></i>
      <span>Espacios</span>
    </a>
  </li>
  <!-- Nav Item - Configuración -->
  <li class="nav-item <?php echo ($view == 'configuracion') ? 'active' : '' ;  ?>">
    <a class="nav-link" href="index.php?espacio=<?php echo $_SESSION['espacio']; ?>&view=configuracion">
      <i class='bx bx-cog nav_icon' ></i>
      <span>Configuración</span>
    </a>
  </li>
  <!-- Nav Item - Pérfil -->
  <li class="nav-item <?php echo ($view == 'perfil') ? 'active' : '' ;  ?>">
    <a class="nav-link" href="index.php?espacio=<?php echo $_SESSION['espacio']; ?>&view=perfil">
      <i class='bx bx-user-circle'></i>
      <span>Perfil</span>
    </a>
  </li>
  <!-- Divider -->
  <hr class="sidebar-divider">
  
  <!-- Heading -->
  <div class="sidebar-heading">Personalice gastos e ingresos</div>
  <!-- Nav Item - Categorías -->
  <li class="nav-item">
    <a class="nav-link" href="index.php?espacio=<?php echo $_SESSION['espacio']; ?>&view=categorias" >
      <i class='bx bx-purchase-tag-alt'></i>
      <span>Categorías</span>
    </a>
  </li>
  <!-- Nav Item - Pages Collapse Menu -->
  <!-- <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
      <i class="fas fa-fw fa-cog"></i>
      <span>Componentes</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="sidebar-heading"> personalizados</div>
      <div class="collapse-inner rounded">
        <a class="collapse-item" href="#">Botones</a>
        <a class="collapse-item" href="#">Cards</a>
      </div>
    </div>
  </li> -->
  <!-- Nav Item - Utilities Collapse Menu -->
  <!-- <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
      <i class="fas fa-fw fa-wrench"></i>
      <span>Utilidades</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
      <div class="sidebar-heading">Utilidades person</div>
      <div class="collapse-inner rounded">
        <a class="collapse-item" href="#">Colores</a>
        <a class="collapse-item" href="#">Bordes</a>
        <a class="collapse-item" href="#">Animaciones</a>
        <a class="collapse-item" href="#">Otros</a>
      </div>
    </div>
  </li> -->
  <!-- Divider -->
  <hr class="sidebar-divider">
  <!-- Heading -->
  <!-- <div class="sidebar-heading">Complementos</div> -->
  
  <!-- Nav Item - Pages Collapse Menu -->
  <!-- <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
      <i class="fas fa-fw fa-folder"></i>
      <span>Paginas</span>
    </a>
    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
      <div class="sidebar-heading">Pantallas</div>
        <div class="collapse-inner rounded">
          <a class="collapse-item" href="#">Inicio de Sesión</a>
          <a class="collapse-item" href="#">Registro</a>
          <a class="collapse-item" href="#">Recuperar contraseña</a>
          <div class="collapse-divider"></div>
          <h6 class="collapse-header">Otras Páginas:</h6>
          <a class="collapse-item" href="#">Página 404</a>
          <a class="collapse-item" href="#">Página en blanco</a>
        </div>
    </div>
  </li> -->
  
  <!-- Nav Item - Charts -->
  <!-- <li class="nav-item">
    <a class="nav-link" href="#"><i class="fas fa-fw fa-chart-area"></i><span>Gráficas</span></a>
  </li> -->
  
  <!-- Nav Item - Tables -->
  <!-- <li class="nav-item">
    <a class="nav-link" href="#"><i class="fas fa-fw fa-table"></i><span>Tablas</span></a>
  </li> -->
  <li class="nav-item">
    <a class="nav-link" href="#" v-on:click="logout"><i class='bx bx-log-out'></i><span>Cerrar sesión</span></a>
  </li>
  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">
  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>  
</ul>
<!-- </div> -->
<!-- End of Sidebar -->