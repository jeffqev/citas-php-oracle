<?php
require_once ('php/metodos.php');
session_start();
if (!isset($_SESSION['Connection'])) {
  header('Location: index.php');
}
?>
<?php



$cone = $_SESSION['Connection'];
$metodos = new Methods($cone);
include 'shared/navbar.php';
?>


<div class="row">


	<div class="col-lg-2">

	</div>

	<div class="col-lg-4">
		<form class="mt-3" method="POST" action="">
		  <div class="form-group">
		    <label for="cedula">ID Habitacion</label>
		    <input  name="cedula" type="text" class="form-control" id="cedula" aria-describedby="emailHelp" placeholder="ID">
		    <small id="emailHelp" class="form-text text-muted">Puede ingresar letras y numeros</small>
		  </div>


      <div class="input-group mb-3">
      <div class="input-group-prepend">
        <label class="input-group-text" for="inputGroupSelect01">Hospital</label>
      </div>
        <select name="nombre" id="nombre" class="custom-select" id="inputGroupSelect01">
          <?php
          $stmoption = $metodos->read("SELECT HOS_ID, HOS_DIRECCION FROM ADMINCITAS.HOSPITAL");
          $stmoption2 = $metodos->read2("SELECT HOS_ID, HOS_DIRECCION FROM ADMINCITAS.HOSPITAL");

          foreach ($stmoption as $row => $taboption)
          {
            for ($i=0; $i < count($stmoption2) ; $i++) {

              if ($i == 0) {
                echo '<option value="'.$taboption[$i].'">';
              }
              if ($i == 1) {
                echo "$taboption[$i]</option>";
              }
              //echo "$tab[$i] ";
            }
          }
          ?>
        </select>
      </div>


		   <div class="form-group">
		    <label for="edad">Descripcion</label>
		    <input  name="edad" type="text" class="form-control" id="edad" aria-describedby="emailHelp" placeholder="Descripcion">
		  </div>


		  <button type="submit" class="btn btn-outline-primary btn-block">INGRESAR</button>
		</form>



    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edicion</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

    				<form class="mt-3" method="POST" action="">
    				  <div class="form-group">
    				    <input  name="cedulaa" type="text" hidden class="form-control" id="cedulae" aria-describedby="emailHelp" placeholder="Cedula">
    				  </div>

    				  <div class="form-group">
    				    <label for="nombree">Nombre</label>
    				    <input  name="nombree" type="text" class="form-control" id="nombree" aria-describedby="emailHelp" placeholder="Nombre">
    				  </div>


    				   <div class="form-group">
    				    <label for="edade">Edad</label>
    				    <input  name="edade" type="text" class="form-control" id="edade" aria-describedby="emailHelp" placeholder="Edad">
    				  </div>

    				   <div class="form-group">
    				    <!-- <label for="direccione">Direccion</label> -->
    				    <input  hidden name="direccione" type="text" class="form-control" id="direccione" aria-describedby="emailHelp" placeholder="Direccion">
    				  </div>


          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-danger" data-dismiss="modal">CERRAR</button>
    				<button type="submit" class="btn btn-outline-primary ">EDITAR</button>
          </div>
    			</form>
        </div>
      </div>
    </div>

    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Eliminacion</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
    				<h5> Esta seguro que desea eliminar?</h5>
    				<form class="mt-3" method="POST" action="">
    				  <div class="form-group">
    				    <input  name="cedulaaa" type="text" hidden class="form-control" id="cedulaaa" aria-describedby="emailHelp" placeholder="Cedula">
    				  </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-danger" data-dismiss="modal">CERRAR</button>
    				<button type="submit" class="btn btn-outline-primary ">ACEPTAR</button>
          </div>
    			</form>
        </div>
      </div>
    </div>


		<?php

		if (isset($_POST['edad'])) {
		$cedula = trim($_POST['cedula']);
		$nombre = trim($_POST['nombre']);
		$edad = trim($_POST['edad']);
		// $direccion = $_POST['direccion'];
    //echo "INSERT INTO ADMINCITAS.HABITACION  VALUES ('$cedula','$nombre','$edad')";
		$metodos->execute("INSERT INTO ADMINCITAS.HABITACION  VALUES ('$cedula','$nombre','$edad')");

		?>
		<small id="emailHelp" class="form-text text-muted ">Dato ingUSado con exito.</small>

		<?php } ?>

		<!-- editar -->
		<?php
		if (isset($_POST['edade'])) {
			$nombre = trim($_POST['nombree']);
			$edad = trim($_POST['edade']);
			$cedula = trim($_POST['cedulaa']);
			// $direccion = $_POST['direccione'];
      // echo "UPDATE ADMINCITAS.HABITACION  SET PA_ID  = '$nombre', CIU_DESCRIPCION = '$edad' WHERE CIU_ID = '$cedula'";
	    $metodos->execute("UPDATE ADMINCITAS.HABITACION  SET HOS_ID   = '$nombre', HAB_DESCRIPCION = '$edad' WHERE HAB_ID = '$cedula'");
		?>
		<small id="emailHelp" class="form-text text-muted ">Dato editado con exito.</small>
		<?php } ?>

		<!-- eliminar -->
		<?php
		if (isset($_POST['cedulaaa'])) {
			$cedula = trim($_POST['cedulaaa']);
	    $metodos->execute("DELETE FROM ADMINCITAS.HABITACION  WHERE HAB_ID = '$cedula'");
		?>
		<small id="emailHelp" class="form-text text-muted ">Dato eliminado con exito.</small>
		<?php } ?>



	</div>



	<?php

	$stm = $metodos->read("SELECT * FROM ADMINCITAS.HABITACION ");
	$stm2 = $metodos->read2("SELECT * FROM ADMINCITAS.HABITACION ");
 ?>
<div class="col-lg-4">

	<table class="table table-hover mt-4" id="tblTest3">
  		<thead>
    		<tr>
      			<?php
		    		foreach ($stm2 as $campo => $registro) {
				?>
		      	<th scope="col"><?php echo $campo."</th>";}?>

 			</tr>
  		</thead>
  		<tbody>
    		<?php
				foreach ($stm as $row => $tab)
				{
					echo "<tr>";
					for ($i=0; $i < count($stm2) ; $i++) {
						echo "<td>$tab[$i] </td>";
					}
					echo '<td><a href="#" class="btn btn-outline-info" data-toggle="modal" data-target="#exampleModal">Editar</a></td>';
					echo '<td><a href="#" class="btn btn-outline-danger"  data-toggle="modal" data-target="#exampleModal2">Eliminar</a></td>';

					echo "</tr>";
				}
     		?>

  		</tbody>
	</table>

</div>



</div>
<?php
include 'shared/footer.php';



?>
