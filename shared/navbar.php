
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>


	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<style type="text/css">
		html {
		  position: relative;
		  min-height: 100%;
		}
		body {
		  /* Margin bottom by footer height */
		  margin-bottom: 60px;
			 /*background-color: #000000;*/

		}
		.footer {
		  position: absolute;
		  bottom: 0;
		  width: 100%;
		  /* Set the fixed height of the footer here */
		  height: 60px;
		  line-height: 60px; /* Vertically center the text there */
		  background-color: #f5f5f5;
		}


		/* Custom page CSS
		-------------------------------------------------- */
		/* Not required for template or sticky footer method. */

		body > .container {
		  padding: 60px 15px 0;
		}

		.footer > .container {
		  padding-right: 15px;
		  padding-left: 15px;
		}

		code {
		  font-size: 80%;
		}
	</style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <a class="navbar-brand" href="recepcionistai.php">FARMAMEC</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
		<!--boton para llamar-->
		<!-- <form action="hospital.php" method="post">
			<input type="submit" value="enviar">
		</form> -->

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav mr-auto">


	      <li class="nav-item">
	        <a class="nav-link" href="medicosi.php">Medicos</a>
	      </li>

				<li class="nav-item">
	        <a class="nav-link" href="pacientesi.php">Pacientes</a>
	      </li>

				<li class="nav-item">
	        <a class="nav-link" href="recepcionistai.php">Recepcionista</a>
	      </li>




				<li class="nav-item dropdown">
	        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	          Hospital
	        </a>
	        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

	          <a class="dropdown-item" href="pais.php">Pais</a>
						<a class="dropdown-item" href="ciudad.php">Ciudad</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="hospital.php">Hospital</a>
						<a class="dropdown-item" href="habitacion.php">Habitaciones</a>

	          <!-- <a class="dropdown-item" href="#">Ediciones</a> -->


	        </div>
	      </li>





	    </ul>
	    <form class="form-inline my-2 my-lg-0">
	      <!-- <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
	      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button> -->
				<a href=" " class="btn btn-outline-dark mr-2"><?php echo $_SESSION['who']; ?></a>
				<a href="especialidad.php" class="btn btn-outline-info mr-2">Generar Cita</a>

				<a href="cerrar.php" class="btn btn-outline-danger">Salir</a>
	    </form>
	  </div>
	</nav>
	<div class="container-fluid">
