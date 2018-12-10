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
    <div id="Info" class="" hidden></div>
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

        if (validando()) {
          $.ajax({
              type: "POST",
              url: "controlador/Logueo_controlador.php?registrar_paciente",
              data:$("#formulario").serialize(),
              success: function(data) {
                $('#Info').removeAttr("hidden");
                $('#Info').attr("class","bg-success text-white p-3");         
                $('#Info').html("REGISTRADO!!");       
                //$('#Info').html(data);
                document.getElementById('formulario').reset(); //limpia el formulario
                setTimeout(function(){ // mantiene el mensaje de confirmación por 1 segundo
                  $('#Info').html(""); 
                  $('#Info').attr("hidden","");
                }, 1500);
              }
          });
          

        }else{

          $('#Info').removeAttr("hidden");
          $('#Info').attr("class","bg-danger text-white p-3"); 
          $('#Info').html("Inconsistencia en los datos");
          setTimeout(function(){ // mantiene el mensaje de confirmación por 1 segundo
            $('#Info').html("");
            $('#Info').attr("hidden","");            
          }, 1500);

        }

        

    });



    function validando(){

      var nombre = document.getElementById('nombre').value;
      var apellidos = document.getElementById('apellidos').value
      var dni = document.getElementById('dni').value
      var direccion = document.getElementById('direccion').value
      var celular = document.getElementById('celular').value

      var email = document.getElementById('email').value;

      var vacio = /^\s+$/.test(nombre);
      var vemail = !/^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,4})$/.test(email)
      console.log("email "+vemail)
      console.log(vacio)

      if ((nombre.length !== 0 && /^\s+$/.test(nombre)) || (apellidos.length !== 0 && /^\s+$/.test(apellidos)) || (dni.length !== 0 && /^\s+$/.test(dni)) || (direccion.length !== 0 && /^\s+$/.test(direccion)) || (celular.length !== 0 && /^\s+$/.test(celular))) {
        console.log("hay espacios escritos" + nombre)
        return false;
      }
      if(nombre.length === 0 || apellidos.length === 0 || dni.length === 0 || direccion.length === 0 || celular.length === 0){
        console.log("Los cuadros de texto están vacios")

        return false
      }
        if(dni.length !== 8){
          console.log("El dni es incorecto")
          return false;
        }
        if(celular.length !== 9){
          console.log("El celular está mal")
          return false;
        }
      if (!/^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,4})$/.test(email)) {
        console.log("El email no es correcto")
        return false;
      }
      console.log("todo perfect!!!!")
      return true;

    }
    

    </script>

  </body>
</html>