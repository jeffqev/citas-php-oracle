<?php
    session_start();
    if (isset($_SESSION['Connection'])) {
      header('Location: medicosi.php');
    }

require_once ('php/metodos.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>


	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/floating-labels.css">
	<style type="text/css">

	</style>
</head>

<body>
    <form class="form-signin" method="POST" action="">
      <div class="text-center mb-4">
        <img class="mb-4" src="img/logo.jpg" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">FARMAMEC</h1>
        <p>Bienvenido al Centro de Citas medicas, espero que sea de su agrado</p>
      </div>

      <div class="form-label-group">
        <input value="ADMINCITAS" type="text" id="inputUser" class="form-control" placeholder="Usuario" name="usuario" required autofocus>
        <label for="inputUser">Usuario</label>
      </div>

      <div class="form-label-group">
        <input value="abc" type="password" id="inputPassword" class="form-control" placeholder="Contraseña" name="password" required>
        <label for="inputPassword">Contraseña</label>
      </div>


      <button class="btn btn-outline-dark btn-block" type="submit">ACEPTAR</button>
      <p class="mt-5 mb-3 text-muted text-center"> Base De Datos II</p>
    </form>



	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="js/popper.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>

	<script type="text/javascript">


	</script>
  </body>
</html>

<?php
    if($_POST){

        $entered = "true";

        try{

            $connection = new Connection($_POST['usuario'], $_POST['password']);
            $who = $_POST['usuario'];
            $connection->connect();
            $_SESSION['Connection'] = $connection;
            $_SESSION['who'] = (string)$who;
             $metodos = new Methods($connection);

        }catch(Exception $e){
            $entered = "false";
            echo ('<script> alert(" contraseña incorrecto"); </script>');

            session_destroy();
        }

        if( $entered == "true"){
          echo ('<script> alert(""); </script>');

            header("Location: medicosi.php");

        }

    }

?>
