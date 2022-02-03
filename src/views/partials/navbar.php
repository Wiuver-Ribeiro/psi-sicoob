<!-- NAVBAR -->
<nav class="navbar nav-bootstrap">
  <div class="box-acoes">
    <div class="dropdown">
      <i class="fas fa-cog "></i>
      <div class="dropdown-content ">
        <ul>
          <div class="avatar-dropdown">
            <div class="avatar-dropdown-info">
              <img src="<?php echo $base . '/assets/icons/default.png'; ?>" alt="" width="25px" height="25px">
              Admin
            </div>
          </div>
          <li>
            <a href="<?php echo $base.'/appointments';?>">
              <i class="fas fa-calendar fa-sm"></i>
              Agendamentos
          </li>
          </a>
          <li>
            <i class="fas fa-cog fa-sm"></i>
            Configurações
          </li>
          <li>
            <a href="<?php echo $base . '/signin'; ?>">
              <i class="fas fa-sign-out-alt fa-sm"></i>
              Logout
            </a>
          </li>
        </ul>
      </div>
    </div>

  </div>
  <!---box-acoes -->
</nav>