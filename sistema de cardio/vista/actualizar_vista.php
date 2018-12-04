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

    <div id="Info"></div>
    <!--INICIO NAVEGAR-->

    <?php 
      include("vista/navegar.html");
     ?>
    <!--FIN NAVEGAR-->


    <section class="container py-3">

      <div class="row justify-content-center">
        <div class="col-sm-12 col-md-7">
          <h1 class="display-4 ">Actualizar <?php echo $_SESSION['USUARIO_ACTUAL']; ?></h1> <hr class="bg-info">
          <p class="pb-0 mb-0"></p>
          <p class="text-danger small pt-0 mt-0"></p>

          <?php 
          //probandoi código
          //var_dump($tabla_paciente);
          //echo $tabla_paciente[0]['DNI'];
          
          foreach ($tabla_paciente as $paciente) {
          	# code...
          }

          foreach ($tabla_datos_paciente as $datos_paciente) {
            # code...
          }

           ?>
          
          <form method="POST" id="formulario" action="controlador/actualizar2_controlador.php">
            <div class="row form-group">
              <label for="nombre" class="col col-md-4 col-form-label">Nombre</label>
              <div class="col-md-8">
                <input type="text" name="nombre" id="nombre" class="form-control" value="<?php echo $paciente['Nombre']; ?>">              
              </div>
            </div>
   
            <div class="row form-group">
              <label for="apellidos" class="col col-md-4 col-form-label">Apellidos</label>
              <div class="col-md-8">
                <input type="text" name="apellidos" id="apellidos" class="form-control" value="<?php echo $paciente['Apellido']; ?>">              
              </div>
            </div>

            <div class="row form-group">
              <label for="email" class="col col-md-4 col-form-label">Email</label>
              <div class="col-md-8">
                <input type="email" name="email" id="email" class="form-control" value="<?php echo $paciente['Correo']; ?>">              
              </div>
            </div>

            <div class="row form-group">
              <label for="celular" class="col col-md-4 col-form-label">Celular</label>
              <div class="col-md-8">
                <input type="text" name="celular" id="celular" class="form-control" value="<?php echo $paciente['Celular']; ?>">              
              </div>
            </div>

            <div class="row form-group">
              <label for="dni" class="col col-md-4 col-form-label">DNI</label>
              <div class="col-md-8">
                <input type="text" name="dni" id="dni" class="form-control" value="<?php echo $paciente['DNI']; ?>">              
              </div>
            </div>

            <h3 class="lead"><b>DATOS MEDICOS</b></h2><p></p>
            <?php 
            	
             ?>

            <div class="row form-group">
              <label for="pesokg" class="col col-md-4 col-form-label">Peso-KG</label>
              <div class="col-md-8">
                <input type="number" name="pesokg" id="pesokg" class="form-control" value="<?php echo $datos_paciente['peso']; ?>">              
              </div>
            </div>

            <div class="row form-group">
              <label for="talla" class="col col-md-4 col-form-label">Talla-CM</label>
              <div class="col-md-8">
                <input type="number" name="talla" id="talla" class="form-control" value="<?php echo $datos_paciente['talla']; ?>">              
              </div>
            </div>
            
            <div class="row form-group">
              <label for="alergias" class="col col-md-4 col-form-label">Alergias?</label>
              <div class="col-md-8">
                <input type="text" name="alergias" id="alergias" class="form-control" value="<?php echo $datos_paciente['alergia']; ?>">              
              </div>
            </div>

            <!--
            <div class="row form-group">
              <label for="id_intcap" class="col col-md-4 col-form-label">ID_INTCAMP</label>
              <div class="col-md-8">
                <input type="text" name="id_intcap" id="id_intcap" class="form-control">              
              </div>
            </div>
        	-->
  
            <div class="row form-group">
              <label for="observacion" class="col col-md-4 col-form-label">Observación</label>
              <div class="col-md-8">
                <textarea rows="3" name="observacion" id="observacion" class="form-control text-left" value="<?php echo $datos_paciente['observacion']; ?>">
                  <?php echo $datos_paciente['observacion']; ?>
                </textarea>       

              </div>
            </div>

            <button type="submit" name="registrar_paciente" class="btn btn-info" id="bton" >ACTUALIZAR</button>
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
	            url: "controlador/actualizar2_controlador.php",
	            data:$("#formulario").serialize(),
	            success: function(data) {
	              $('#Info').html(data);
	              console.log(data);
	              setTimeout(function(){ // mantiene el mensaje de confirmación por 1 segundo
	                $('#Info').html(""); 
	              }, 1500);
	              //$dato1 = $_REQUEST['dato1'];
	            }
	        });
		});
	    </script>

  </body>
</html>