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
        height: 300px;
      }
    </style>

    <title>INTCAP</title>
  </head>
  <body>

    <!--
    <div class="container text-center py-2 text-gray-dark">
      <h1 class="display-3">HOLA, ###!</h1>
    </div>
    -->
    
    <!--INICIO NAVEGAR-->
    <?php include 'vista/navegar.html'; ?>
    <!--FIN NAVEGAR-->

    <section class="container py-3">
      <p class="float-left">USUARIO <a href="#"> <?php echo $_SESSION['USUARIO']; ?></a></p>
      <h3 class="text-center mb-3 text-uppercase font-italic">pacientes</h3>
      
      <?php 
        $num_usuario=0;
        $controla_color = 0;
        foreach($tabla_usuario as $fila_u) {
          // code...
          $num_usuario++; // Enumera los pacientes en el registro
          if($controla_color){
            $controla_color = 0;
          }else{
            $controla_color = 1;
          }

       ?>

      <div class="row align-items-center">
        <div class="col-6 col-sm-6 col-md-8 <?php echo color_varia($controla_color); ?> pt-3">
          <p class="text-uppercase"><?php echo "Paciente ".$num_usuario." ".$fila_u['Nombre']." ".$fila_u['Apellido']; ?></p>
        </div>
        <div class="col-6 col-sm-6 col-md-4 text-right">
          <button class="btn btn-primary" value="<?php echo $fila_u['DNI']; ?>" id="<?php echo $fila_u['DNI']; ?>" onclick="cargarDatos(this)">VER REGISTROS</button>
        </div>
      </div>
      <?php } ?>
    </section>


    <div class="container">
      <div class="row bg-dark text-white alto align-items-start">
        
        <div class="col  align-self-center">
            <iframe id="cardiograma" width="450px" height="249px" src=" <?php echo $_SESSION['URL']; ?> ">
              <p>CARDIOGRMAA</p>
            </iframe>

          </div>
        <div class="col align-self-center">
          <form>
              <div class="form-group">
              <textarea class="form-control" id="observacion" placeholder="OBSERVACIONES..." rows="7" onkeypress="validar(event)"></textarea>
            </div>
          </form>
          <div id="Info"></div>
          <input type="hidden" id="idpaciente" name="custId" value="<?php echo $_SESSION['USUARIO_ACTUAL']; ?>">

        </div>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script type="text/javascript" src="vista/js/bootstrap.min.js"></script>
     <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js" type="text/javascript"></script>
 
    <script type="text/javascript">

// función para guardar observaciones del docto
function validar(e) {
  tecla = (document.all) ? e.keyCode : e.which;
  if (tecla==13) {
    var txtObservacion = $("#observacion").val(); 
    console.log(txtObservacion.length);
    var codigo = $("#idpaciente").val();
    if (txtObservacion.length !== 0 && !/^\s+$/.test(txtObservacion)) { //Si no está vacio
        console.log(codigo+" tiene el mesaje: "+txtObservacion);
        $.ajax({
            type: "POST",
            url: "controlador/graf_obs_controlador.php",
            data: {"observacion": txtObservacion,
                   "codigo": codigo},
            success: function(data) {
              $('#Info').html(data);
              setTimeout(function(){ // mantiene el mensaje de confirmación por 1 segundo
                $('#Info').html(""); 
              }, 1500);
              //$dato1 = $_REQUEST['dato1'];
            }
        });
    }else{
      console.log("NO SE GUARDO NADA")
    }
    $('#observacion').val("");
  }
}

//función que carga el cardiograma para cada usuario y coloca valor al input hidden
function cargarDatos(e){
  var codigo = e.value;
  console.log("Se seleccionó el id "+codigo);
  $("#idpaciente").val(codigo); // colocando valor al input ocultooo
  // aca el ajax que carga el cardiograma. solo la URL. URL que estará en la base de datos
  $.ajax({
      type: "POST",
      url: "controlador/graf_obs_controlador.php",
      data: {"codigo": codigo,
             "cardiograma":""},
      success: function(data) {
        console.log("URL "+data);
      //  $('#cardiograma').src();

        var b = document.querySelector("iframe")
        b.setAttribute("src", data);
      }
  });
}

    </script>
  </body>
</html>