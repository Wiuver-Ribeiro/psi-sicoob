<!--Inclusão do header -->
<?php $render('header'); ?>


<main class="container-main">
  <section id="principal" class="container">
    <div class="informacoes-principais">
      <span style="font-size: 1.2rem;">Estamos aqui pra você</span>
      <h1 class="title-principal">Os melhores psicólogos</h1>
      <p class="descricao-principal">Aqui na PSI, você encontra os melhores psicólogos da região, <br> com atendimento diferenciado e um
        agendamento muito fácil.
      </p>
      <a href="#">AGENDE SUA CONSULTA</a>
    </div>

    <div class="doctor">
      <img src="<?php echo $base . '/assets/pictures/doctors1.png'; ?>" alt="Wallpaper Doctors" width="600px" height="600px">
    </div>
  </section>
  <!--Info-->

  <section id="sobre" class="container">
    <img src="<?php echo $base . '/assets/pictures/calendar.png' ?>" alt="" width="600px" height="600px">

    <div class="informacoes-principais">
      <h1 class="title-principal">Sobre nós</h1>
      <p class="descricao-principal">Nosso principal objetivo é que nossos pacientes encontrem o médico perfeito e agende uma consulta do modo mais fácil possível. Essa jornada precisa ser agradável, por isso sempre estamos dispostos a ajudar.</p>

      <div class="box-icones">
        <div class="box-icones-info">
          <img src="<?php echo $base . '/assets/icons/banner_1.svg'; ?>" alt="Icone Psicologos">
          <span>Psicologos</span>
        </div>
        <div class="box-icones-info">
          <img src="<?php echo $base . '/assets/icons/banner_2.svg'; ?>" alt="Icone Agendamento">
          <span>Agendamento</span>
        </div>
        <div class="box-icones-info">
          <img src="<?php echo $base . '/assets/icons/banner_3.svg'; ?>" alt="Icone Qualificados">
          <span>Qualificados</span>
        </div>

      </div>
    </div>
  </section>
  <!--sobre-->

  <section id="servicos" class="container servicos">
    <div class="informacoes-principais">
      <h1 class="title-principal" style="text-align: center; font-size:3rem">Nossos serviços</h1>
      <div class="grid-items">
        <div class="grid-content pediatria">
          <span>
            <img src="<?php echo $base.'/assets/pictures/children.png'; ?>" alt="Crianças">
            Pediatria
          </span>
          <p>Nossa missão é oferecer suporte preventivo, para que crianças e adolescentes cresçam saudáveis e felizes.</p>
        </div>
        <div class="grid-content cardiologia">
          <span>
            <img src="<?php echo $base . '/assets/pictures/heart.png'; ?>" alt=""> 
            Cardiologia
          </span>
          <p>Nossos médicos cardiologistas são altamente qualificados para identificação das doenças de um dos principais orgãos do corpo humano.</p>
        </div>
        <div class="grid-content doctor-img">
          <img src="<?php echo $base . '/assets/pictures/doctors2.png'; ?>" alt="" width="400px" height="400px">
        </div>
        <div class="grid-content oftalmologista">
          <span>
            <img src="<?php echo $base.'/assets/pictures/eye.png'; ?>" alt="Crianças">
            Oftamologista

          </span>
          <p>O cuidado com as doenças que acometem os olhos e a visão são conduzidos pelos nosso médicos oftalmologistas.</p>
        </div>
        <div class="grid-content ortopedia">
          <span>
            <img src="<?php echo $base . '/assets/pictures/bone.png'; ?>" alt="">
            Ortopedia

          </span>
          <p>Nossos ortopedistas cuidaram dos seus ossos, músculos, articulações, ligamentos e outros componentes do seu sistema.</p>
        </div>
      </div>
      <!---GRID-ITEMS-->
    </div>
  </section> <!--Serviços-->

  <section id="psi" class="container">
    <div class="informacoes-principais">
      <h1 class="title-principal" style="text-align: center; font-size:3rem;margin-bottom:2rem;">Nossos Psicólogos</h1>
      <div class="grid-psi">
        <div class="grid-psi-info">
          <img src="<?php echo $base.'/assets/pictures/1.jpg';?> " alt="">
          <span>Dra Adriana Galvão</span>
        </div>
        <div class="grid-psi-info">
          <img src="<?php echo $base.'/assets/pictures/2.jpg';?> " alt="">
          <span>Dr Manoel Corte</span>
        </div>
        <div class="grid-psi-info">
          <img src="<?php echo $base.'/assets/pictures/3.jpg';?> " alt="">
          <span>Dra Cecília Nascimento</span>
        </div>
        <div class="grid-psi-info">
          <img src="<?php echo $base.'/assets/pictures/4.jpg';?> " alt="">
          <span>Dr Matheus Novaes</span>
        </div>
        <div class="grid-psi-info">
          <img src="<?php echo $base.'/assets/pictures/5.jpg';?> " alt="">
          <span>Dra Maria Conceição</span>
        </div>
        <div class="grid-psi-info">
          <img src="<?php echo $base.'/assets/pictures/6.jpg';?> " alt="">
          <span>Dr Francísco Benício</span>
        </div>
      </div>
    </div>
  </section>
</main>
<script src="https://kit.fontawesome.com/dba7af9f9b.js" crossorigin="anonymous"></script>
<script src="<?php echo $base.'/assets/js/script.js'; ?>"></script>
<?php $render('footer'); ?>