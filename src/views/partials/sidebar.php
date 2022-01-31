<aside class="sidebar">
  <div class="logo">
    <img src="<?php echo $base.'/assets/icons/icon_app.png';?>" alt="Logo">
    PSI - Sicoob Centro-sul
  </div>

  <div class="box-sidebar">
    <span>MENU</span>
    <ul>
      <li class="tab1"><a href="<?php echo $base .'/dashboard';?>" onclick="activeTab('dashboard')" ><i class="fas fa-home" style="color: #FFCBCD; margin-right: 1rem"></i>Dashboard</a></li>
      <li class="tab"><a href="<?php echo $base .'/appointments'; ?>" onclick="activeTab('appointments')" ><i class="fas fa-calendar" style="color:#01A9AC; margin-right:1rem;"></i>Agendamentos</a></li>
      <li class="tab"><a href="<?php echo $base .'/doctors'; ?>" onclick="activeTab('doctors')" ><i class="fas fa-user-friends" style="color:#9595DF; margin-right:1rem;"></i>Psicólogos</a></li>
      <li class="tab"><a href="<?php echo $base .'/patients'?> " onclick="activeTab('patients')" ><i class="fas fa-user-alt" style="color:#8DC9E8; margin-right:1rem;"></i>Pacientes</a></li>
      <li class="tab"><a href="<?php echo $base .'/admins'; ?>" onclick="activeTab('admins')" ><i class="fas fa-lock" style="color:#F4C22B; margin-right:1rem;"></i>Administradores</a></li>
      <li class="tab"><i class="fas fa-cog" style="color:#4DC6FA; margin-right:1rem;" style="color:#1CA9F5; margin-right:1rem;"></i>Configuração</li>
      <li class="tab"><a href="<?php echo $base .'/logout'; ?>" onclick="activeTab('logout')" ><i class="fas fa-power-off" style="color:#FF6D8F; margin-right:1rem;"></i>Logout</a></li>
    </ul>
  </div>
</aside>