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

    <?php 
      include("vista/navegar.html");
     ?>
    <!--FIN NAVEGAR-->



    <section class="container py-3">

<div class="row justify-content-center">
  <div class="col-sm-12 col-md-7">
    <h1 class="display-4 ">Registrar</h1> <hr class="bg-info">
    <p class="text-danger small pt-0 mt-0">*Todos los campos son obligatorios</p>
    <form id="formulario" method="POST" action="controlador/Logueo_controlador.php" >
      <div class="row form-group">
        <label for="nombre" class="col col-md-4 col-form-label">Nombre</label>
        <div class="col-md-8">
          <input type="text" name="nombre" id="nombre" class="form-control" required>              
        </div>
      </div>

      <div class="row form-group">
        <label for="apellidos" class="col col-md-4 col-form-label">Apellidos</label>
        <div class="col-md-8">
          <input type="text" name="apellidos" id="apellidos" class="form-control" required>              
        </div>
      </div>

<div class="row form-group">
        <label for="dni" class="col col-md-4 col-form-label">DNI</label>
        <div class="col-md-8">
          <input type="number" name="dni" id="dni" class="form-control" required>              
        </div>
      </div>

      <div class="row form-group">
        <label for="email" class="col col-md-4 col-form-label">Email</label>
        <div class="col-md-8">
          <input type="email" name="email" id="email" class="form-control" required>              
        </div>
      </div>

      <div class="row form-group">
        <label for="direccion" class="col col-md-4 col-form-label">Dirección</label>
        <div class="col-md-8">
          <input type="text" name="direccion" id="direccion" class="form-control" required>              
        </div>
      </div>

      <div class="row form-group">
        <label for="celular" class="col col-md-4 col-form-label">Celular</label>
        <div class="col-md-8">
          <input type="number" name="celular" id="celular" class="form-control" required>              
        </div>
      </div>    

      <div class="row form-group">
        <label for="celular2" class="col col-md-4 col-form-label">Celular 2</label>
        <div class="col-md-8">
          <input type="number" name="celular2" id="celular2" class="form-control">              
        </div>
      </div>

      <div class="row form-group" hidden>
        <label for="password" class="col col-md-4 col-form-label">Contraseña</label>
        <div class="col-md-8">
          <input type="password" name="password" id="password" class="form-control" required>              
        </div>
      </div>
      
      <button type="submit" name="registrar_paciente" id="bton" class="btn btn-info">REGISTRAR</button>
      <div id="Info"></div>
    </form>

  </div>
</div>

</section>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script type="text/javascript" src="vista/js/bootstrap.min.js"></script>


    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js" type="text/javascript"></script>
 
    <script type="text/javascript">
      
      document.getElementById("bton").addEventListener("click", function(event){

        event.preventDefault()
        $.ajax({
              type: "POST",
              url: "controlador/Logueo_controlador.php?registrar_paciente",
              data:$("#formulario").serialize(),
              success: function(data) {
                $('#Info').html(data);
                console.log(data);
                document.getElementById('formulario').reset(); //limpia el formulario
                setTimeout(function(){ // mantiene el mensaje de confirmación por 1 segundo
                  $('#Info').html("");             
                }, 1500);
              }
          });
    });
    
    </script>

  </body>
</html>