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
        <div class="col-12 pt-3 <?php echo color_varia($controla_color); ?>">
          <h3><?php echo $fila_obs['fecha']; ?></h3>
          <p class="text-justify" id="obs<?php echo $fila_obs['id']; ?>"><?php echo $fila_obs['observacion']; ?></p>
          <ul class="list-inline">
            <li class="list-inline-item"><a href="#" id="<?php echo $fila_obs['fecha']; ?>" class="text-success" onclick="obtenerDatoFecha(this, <?php echo "obs".$fila_obs['id']; ?>)">Modificar</a></li>
            <li class="list-inline-item"><a href="controlador/accionesObs_controlador.php?elimina&fecha_eli=<?php echo $fila_obs['fecha']; ?>" class="text-danger">Eliminar</a></li>
          </ul>
        </div>
      </div>
      <?php 
      }
       ?> 
      <div class="row form-group" id="modificar" hidden>
          <label for="observacion" class="col col-md-12 col-form-label" >MODIFICAR </label>
          <div class="col-md-12">
            <textarea rows="3" name="observacion_m" id="observacion_m" class="form-control" value="" onkeypress="modificar(event,this)">
              
            </textarea>           
          </div>
      </div>



<!--
-->	
      <!--///-->
      
    </section>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script type="text/javascript" src="vista/js/bootstrap.min.js"></script>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js" type="text/javascript"></script>
 
    <script type="text/javascript">
      
      var fecha=0;
      var ObsId_parrafo = 0;
      var txtvaciar = document.getElementById('observacion_m');

      function set_fecha(date){
        fecha=date;
      }
      function verFecha(){
        return fecha;
      }

      function set_idp(id){
        ObsId_parrafo=id;
      } 
      function get_idp(){
        return ObsId_parrafo;
      }     

      var controlando_error = true;
      //modificar observacion
      function obtenerDatoFecha(e,idp){

        if (controlando_error) {

          set_idp(idp.id);
          set_fecha(e.id)
          console.log(verFecha())
          console.log(get_idp());

          //console.log(idp);

          $('#observacion_m').html("");
          $('#observacion_m').html(idp.innerHTML);

          $('#modificar').removeAttr('hidden');
          //imprimir observación en el texto
          $('#Info').html("SELECCIONADO!!");
          setTimeout(function(){ // mantiene el mensaje de confirmación por 1 segundo
            $('#Info').html(""); 
          }, 1500);

        }else{
          location.href ="index.php?historial";
        }
       
      }


      // función para guardar observaciones del docto
      function modificar(e, th) {
        tecla = (document.all) ? e.keyCode : e.which;
        //document.getElementById(get_idp()).innerHTML=th.value;
        controlando_error=false;
        if (tecla==13) {
          //var id = "#"+get_idp();
          let txtObservacion = th.value; 

          if (txtObservacion.length !== 0 && !/^\s+$/.test(txtObservacion)) { //Si no está vacio

              $.ajax({
                  type: "POST",
                  url: "controlador/accionesObs_controlador.php?modifica",
                  data: {"observacion": th.value,
                         "fecha": verFecha()},
                  success: function(data) {
                    //th.value="";
                    $('#Info').html(data);
                    setTimeout(function(){ // mantiene el mensaje de confirmación por 1 segundo
                      $('#Info').html(""); 
                      location.href ="index.php?historial";
                    }, 1500);
                  }
              });
          }else{
            console.log("NO SE GUARDO NADA")
          }

          //$('#observacion_m').html("");
          //$('#modificar').attr('hidden','');

        }
      }




      </script>


  </body>
</html>