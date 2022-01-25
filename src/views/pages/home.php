<!--Inclusão do header -->
<?php $render('header'); ?>
<link rel="stylesheet" href="<?php echo $base . '/assets/css/components/main.css' ?>">

<main class="container-main">
  <section class="container">
    <div class="informacoes-principais">
      <span style="font-size: 1.2rem;">Estamos aqui pra você</span>
      <h1 class="title-principal">Os melhores psicólogos</h1>
      <p style="font-size:1.2rem;text-align: center;">Aqui na PSI, você encontra os melhores psicólogos da região, com atendimento diferenciado e um
        agendamento muito fácil.
      </p>
      <a href="#">AGENDE SUA CONSULTA</a>
    </div>

    <div class="doctor">
      <img src="<?php echo $base . '/assets/pictures/doctors1.png'; ?>" alt="Wallpaper Doctors" width="600px" height="600px">
    </div>
  </section>
  <section id="sobre" class="container">
   <img src="<?php echo $base.'/assets/pictures/calendar.png'?>" alt="" width="700px" height="700px">
  </section>
</main>