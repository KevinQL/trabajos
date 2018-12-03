<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="vista/css/bootstrap.min.css">

    <style type="text/css">
      .alto{
        height: 200px;
      }
    </style>

    <title>INTCAP</title>
  </head>
  <body>

    
    <!--INICIO NAVEGAR-->
    <?php include 'vista/navegar.html'; ?>
    <!--FIN NAVEGAR-->

    <section class="container py-3">      
      <!--///-->

      <h3 class="text-center mb-3 text-uppercase font-italic">HISTORIAL PACIENTE </h3>
      <?php 

      $controla_color = 0;
      foreach ($tabla_observaciones as $fila_obs) {
      	# code...
      	if($controla_color){
      		$controla_color = 0;
      	}else{
      		$controla_color = 1;
      	}

       ?>
      <div class="row">
        <div class="col-6 col-sm-6 col-md-8 pt-3 <?php echo color_varia($controla_color); ?>">
          <h3><?php echo $fila_obs['fecha']; ?></h3>
          <p class="text-justify"><?php echo $fila_obs['observacion']; ?></p>
        </div>
        <div class="col-6 col-sm-6 col-md-4 text-right align-self-center">
          <button class="btn btn-primary">VER REGISTROS</button>
        </div>
      </div>
      <?php 
      }
       ?>

<!--
-->	
      <!--///-->
      
    </section>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script type="text/javascript" src="vista/js/bootstrap.min.js"></script>
  </body>
</html>