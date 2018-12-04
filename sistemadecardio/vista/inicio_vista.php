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
		<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
		  <ol class="carousel-indicators">
		    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
		    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
		    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
		  </ol>
		  <div class="carousel-inner">
		    <div class="carousel-item active">
		    	<!--1023 × 559-->
		      <img class="d-block w-100" height="559px" src="vista/img/img01.jpg" alt="First slide">
		      <div class="carousel-caption d-none d-md-block text-secondary">
			    <h5>IMAGEN DE PRUEBA</h5>
			    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis, officia officiis explicabo iste sit inventore</p>
			  </div>

		    </div>
		    <div class="carousel-item">
		      <img class="d-block w-100" height="559px" src="vista/img/img11.png" alt="Second slide">
		    </div>
		    <div class="carousel-item">
		      <img class="d-block w-100" height="559px" src="vista/img/img12.jpg" alt="Third slide">
		    </div>
		  </div>
		  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
		    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
		    <span class="sr-only">Previous</span>
		  </a>
		  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
		    <span class="carousel-control-next-icon" aria-hidden="true"></span>
		    <span class="sr-only">Next</span>
		  </a>
		</div>

      <!--///-->
      
    </section>


    <div class="container">
      <div class="row bg-dark text-white alto align-items-start">
        <div class="col">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus, laboriosam!</div>
        <div class="col align-self-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum, labore?</div>
        <div class="col">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi, consequuntur.</div>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script type="text/javascript" src="vista/js/bootstrap.min.js"></script>
  </body>
</html>