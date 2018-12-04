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
          <h1 class="display-4 ">Registro</h1> <hr class="bg-info">
          <p class="pb-0 mb-0">Bienvenido!!</p>
          <p class="text-danger small pt-0 mt-0">*Todos los campos son obligatorios</p>
          
          <form method="POST" action="controlador/Logueo_controlador.php">
            <div class="row form-group">
              <label for="nombre" class="col col-md-4 col-form-label">Nombre</label>
              <div class="col-md-8">
                <input type="text" name="nombre" id="nombre" class="form-control">              
              </div>
            </div>

            <div class="row form-group">
              <label for="apellidos" class="col col-md-4 col-form-label">Apellidos</label>
              <div class="col-md-8">
                <input type="text" name="apellidos" id="apellidos" class="form-control">              
              </div>
            </div>

            <div class="row form-group">
              <label for="email" class="col col-md-4 col-form-label">Email</label>
              <div class="col-md-8">
                <input type="email" name="email" id="email" class="form-control">              
              </div>
            </div>

            <div class="row form-group">
              <label for="direccion" class="col col-md-4 col-form-label">Dirección</label>
              <div class="col-md-8">
                <input type="text" name="direccion" id="direccion" class="form-control">              
              </div>
            </div>

            <div class="row form-group">
              <label for="celular" class="col col-md-4 col-form-label">Celular</label>
              <div class="col-md-8">
                <input type="number" name="celular" id="celular" class="form-control">              
              </div>
            </div>

            <div class="row form-group">
              <label for="telefono" class="col col-md-4 col-form-label">Teléfono</label>
              <div class="col-md-8">
                <input type="number" name="telefono" id="telefono" class="form-control" required="">              
              </div>
            </div>

            <div class="row form-group">
              <label for="dni" class="col col-md-4 col-form-label">DNI</label>
              <div class="col-md-8">
                <input type="number" name="dni" id="dni" class="form-control">              
              </div>
            </div>

            <h3 class="lead"><b>DATOS MEDICOS</b></h2><p></p>

            <div class="row form-group">
              <label for="pesokg" class="col col-md-4 col-form-label">Peso-KG</label>
              <div class="col-md-8">
                <input type="number" name="pesokg" id="pesokg" class="form-control">              
              </div>
            </div>

            <div class="row form-group">
              <label for="talla" class="col col-md-4 col-form-label">Talla-CM</label>
              <div class="col-md-8">
                <input type="number" name="talla" id="talla" class="form-control">              
              </div>
            </div>

            <div class="row form-group">
              <label for="tipo_sangre" class="col col-md-4 col-form-label">Tipo sangre</label>
              <div class="col-md-8">
                <select id="tipo_sangre" name="tipo_sangre" class="form-control">
                  <option value="O+">O+</option>
                  <option value="O-">O-</option>
                  <option value="B+">B+</option>
                  <option value="B-">B-</option>
                  <option value="A+">A+</option>
                  <option value="A-">A-</option>
                  <option value="AB+">AB+</option>
                  <option value="AB-">AB-</option>
                </select>              
              </div>
            </div>
            
            <div class="row form-group">
              <label for="alergias" class="col col-md-4 col-form-label">Alergias?</label>
              <div class="col-md-8">
                <input type="text" name="alergias" id="alergias" class="form-control">              
              </div>
            </div>

            <div class="row form-group">
              <label for="id_intcap" class="col col-md-4 col-form-label">ID_INTCAMP</label>
              <div class="col-md-8">
                <input type="text" name="id_intcap" id="id_intcap" class="form-control">              
              </div>
            </div>
  
            <div class="row form-group">
              <label for="observacion" class="col col-md-4 col-form-label">Observación</label>
              <div class="col-md-8">
                <textarea rows="3" name="observacion" id="observacion" class="form-control">
                  
                </textarea>           
              </div>
            </div>

            <button type="submit" name="registrar_paciente" class="btn btn-info">REGISTRAR</button>

          </form>
        </div>
      </div>
      
    </section>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script type="text/javascript" src="vista/js/bootstrap.min.js"></script>
  </body>
</html>