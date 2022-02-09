<?php 
  $type = $_SESSION['logado'][0]['type'];
  use \src\controllers\DoctorController;

  $doctors = DoctorController::getAllDoctors();
 

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" href="<?php echo $base . '/assets/icons/scs.ico'; ?>" type="image/x-icon" />

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo $base . '/assets/css/reset.css'; ?>">
  <link rel="stylesheet" href="<?php echo $base . '/assets/css/components/sidebar.css'; ?>">
  <link rel="stylesheet" href="<?php echo $base . '/assets/css/components/navbar.css'; ?>">
  <link rel="stylesheet" href="<?php echo $base . '/assets/css/components/dashboard.css'; ?>">
  <link rel="stylesheet" href="<?php echo $base . '/assets/css/components/doctors.css'; ?>">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="<?php echo $base . '/assets/js/script.js'; ?>"></script>

  <title>PSI | Doctors </title>
</head>

<body>
  <?php $render('navbar'); ?>
  <?php $render('sidebar'); ?>
  <main>
    <div class="main-container">
      <section class="default">
        <h3 style="text-align:left">Psicólogos</h3>
        <div class="content-psi">
          <div class="content-psi-header">
          <h4 style="font-weight:500">Todos os psicólogos</h4>
          <?php 
            echo ($type == 'admin') ? "<button>
            <a href='$base/doctors/create' style='color:blue;'><i class='fas fa-user-plus'></i></a>
            </button>" : "";?>
          </div>
        <div class="grid-doctors" >
          <?php foreach($doctors as $allDoctors): ?>
          <div class="doctor-box" data-bs-toggle="modal" data-bs-target="#agendar">
              <img src="<?php echo $base.'/assets/icons/avatar-fabiano.jpg'; ?>" alt="">
              <div class="doctor-info">
                <span><?php echo $allDoctors['name'];?></span>
                <span><?php echo $allDoctors['speciality'];?></span>
              </div>
          </div> <!---doctor-box-->
          <?php endforeach; ?> <!--endforeach-->
        </div> <!---grid-doctors-->
        </div> <!---content-psi--->
      </section>
    </div>
    <!--main-container-->
    <!-- MODAIS PARA MARCAR CONSULTA -->
    <div class="modal fade" id="agendar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Agendar Consulta</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form method="POST" action="#">
              <div class="row mb-3">
                <label for="title" class="col-sm-2 col-form-label">Doutor:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="title" name="title">
                </div>
              </div>
 
              <div class="row mb-3">
                <label for="start" class="col-sm-2 col-form-label">Início da Consulta:</label>
                <div class="col-sm-10">
                  <input type="datetime-local" class="form-control" id="start" name="start" onkeypress="DataHora(event, this)">
                </div>
              </div>
              <div class="row mb-3">
                <label for="end" class="col-sm-2 col-form-label">Fim da Consulta:</label>
                <div class="col-sm-10">
                  <input type="datetime-local" class="form-control" id="end" name="end" onkeypress="DataHora(event, this)">
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-success">Agendar Consulta</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </main>



  
  <script src="https://kit.fontawesome.com/dba7af9f9b.js" crossorigin="anonymous"></script>
</body>

</html>