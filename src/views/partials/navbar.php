<!-- NAVBAR -->


<?php 
use \src\models\USer;
  $usuario = new User();
  $info = $usuario->dadosLogado();  

?>
<nav class="navbar nav-bootstrap">
  <div class="box-acoes">
    <div class="dropdown">
      <i class="fas fa-cog "></i>
      <div class="dropdown-content ">
        <ul>
          <div class="avatar-dropdown">
            <div class="avatar-dropdown-info">
              <img src="<?php echo $base . '/assets/icons/'.$info['avatar']; ?>" alt="" width="40px" height="40px">
            <span><?php echo $info['nome']; ?> </span>
            </div>
          </div>
          <li>
            <a href="<?php echo $base.'/appointments';?>">
              <i class="fas fa-calendar fa-sm"></i>
              Agendamentos
            </a>
          </li>
          <li>
            <a href="<?php echo $base.'/config';?>">
              <i class="fas fa-cog fa-sm"></i>
              Configurações
            </a>
          </li>
          <li>
            <a href="<?php echo $base . '/logout'; ?>">
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