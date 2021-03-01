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

<?php
//TIPO DE MEDICO
if (isset($_POST['boton'])) {
  $med = $_POST['boton'];
}else {
  header('Location: especialidad.php');
}

  ?>
<!-- <h5 class="text-center">Cita <?php// echo $med; ?></h5> -->
<div class="row">


	<div class="col-lg-3">

	</div>

	<div class="col-lg-6">
		<form class="mt-3" method="POST" action="">
		  <!-- <div class="form-group">
		    <label for="cedula">Cedula</label>
		    <input  name="cedula" type="text" class="form-control" id="cedula" aria-describedby="emailHelp" placeholder="Cedula">
		    <small id="emailHelp" class="form-text text-muted">Ingrese una cedula valida.</small>
		  </div> -->

      <div class="input-group mb-3">
      <div class="input-group-prepend">
        <label class="input-group-text" for="inputGroupSelect01">Recepcionista</label>
      </div>
        <select name="cedula" id="cedula" class="custom-select" id="inputGroupSelect01">
          <?php
          $stmoption = $metodos->read("SELECT RES_CEDULA , RES_NOMBRE FROM ADMINCITAS.RECEPCIONISTA ");
          $stmoption2 = $metodos->read2("SELECT RES_CEDULA , RES_NOMBRE FROM ADMINCITAS.RECEPCIONISTA");

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


		  <!-- <div class="form-group">
		    <label for="nombre">Nombre</label>
		    <input  name="nombre" type="text" class="form-control" id="nombre" aria-describedby="emailHelp" placeholder="Nombre">
		  </div> -->

      <div class="input-group mb-3">
      <div class="input-group-prepend">
        <label class="input-group-text" for="inputGroupSelect01">Paciente</label>
      </div>
        <select name="nombre" id="nombre" class="custom-select" id="inputGroupSelect01">
          <?php
          $stmoption = $metodos->read("SELECT US_CEDULA , US_NOMBRE FROM ADMINCITAS.USUARIOS  ");
          $stmoption2 = $metodos->read2("SELECT US_CEDULA , US_NOMBRE FROM ADMINCITAS.USUARIOS ");

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

		   <!-- <div class="form-group">
		    <label for="edad">Edad</label>
		    <input  name="edad" type="text" class="form-control" id="edad" aria-describedby="emailHelp" placeholder="Edad">
		  </div> -->

      <div class="input-group mb-3">
      <div class="input-group-prepend">
        <label class="input-group-text" for="inputGroupSelect01">Medico</label>
      </div>
        <select name="edad" id="edad" class="custom-select" id="inputGroupSelect01">
          <?php

          $stmoption = $metodos->read("SELECT MEDICOS.ME_CEDULA, MEDICOS.ME_NOMBRE  FROM ADMINCITAS.ESPECIALIDAD, ADMINCITAS.MEDICOS WHERE MEDICOS.ME_CEDULA = ESPECIALIDAD.ME_CEDULA AND ESPECIALIDAD.ES_DESCRIPCION = '$med'");
          $stmoption2 = $metodos->read2("SELECT MEDICOS.ME_CEDULA, MEDICOS.ME_NOMBRE  FROM ADMINCITAS.ESPECIALIDAD, ADMINCITAS.MEDICOS WHERE MEDICOS.ME_CEDULA = ESPECIALIDAD.ME_CEDULA AND ESPECIALIDAD.ES_DESCRIPCION = '$med'");

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

		   <!-- <div class="form-group">
		    <label for="direccion">Direccion</label>
		    <input  name="direccion" type="text" class="form-control" id="direccion" aria-describedby="emailHelp" placeholder="Direccion">
		  </div> -->
      <div class="input-group mb-3">
      <div class="input-group-prepend">
        <label class="input-group-text" for="inputGroupSelect01">Habitacion</label>
      </div>
        <select name="direccion" id="direccion" class="custom-select" id="inputGroupSelect01">
          <?php
          $stmoption = $metodos->read("SELECT HAB_ID , HAB_DESCRIPCION FROM ADMINCITAS.HABITACION    ");
          $stmoption2 = $metodos->read2("SELECT HAB_ID , HAB_DESCRIPCION FROM ADMINCITAS.HABITACION   ");

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
       <label for="fecha">Fecha</label>
       <input  name="fecha" type="date" class="form-control" id="fecha"  >
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
    				    <label for="direccione">Direccion</label>
    				    <input  name="direccione" type="text" class="form-control" id="direccione" aria-describedby="emailHelp" placeholder="Direccion">
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
		$cedula = $_POST['cedula'];
		$nombre = $_POST['nombre'];
		$edad = $_POST['edad'];
		$direccion = $_POST['direccion'];
    $fecha = $_POST['fecha'];
    $fecha= date("d/m/Y", strtotime($fecha));
		$metodos->execute("INSERT INTO ADMINCITAS.CITA VALUES (admincitas.citaid.nextval,'$cedula','$nombre','$edad','$direccion','$fecha')");

		?>
		<small id="emailHelp" class="form-text text-muted ">Dato ingresado con exito.</small>

		<?php } ?>

		<!-- editar -->
		<?php
		if (isset($_POST['edade'])) {
			$nombre = $_POST['nombree'];
			$edad = $_POST['edade'];
			$cedula = trim($_POST['cedulaa']);
			$direccion = $_POST['direccione'];
	    $metodos->execute("UPDATE ADMINCITAS.RECEPCIONISTA SET RES_NOMBRE = '$nombre', RES_EDAD = '$edad', RES_DIRECCION = '$direccion' WHERE RES_CEDULA = '$cedula'");
		?>
		<small id="emailHelp" class="form-text text-muted ">Dato editado con exito.</small>
		<?php } ?>

		<!-- eliminar -->
		<?php
		if (isset($_POST['cedulaaa'])) {
			$cedula = trim($_POST['cedulaaa']);
	    $metodos->execute("DELETE FROM ADMINCITAS.CITA WHERE  ID_CITA  = '$cedula'");
		?>
		<small id="emailHelp" class="form-text text-muted ">Dato eliminado con exito.</small>
		<?php } ?>



	</div>
  <div class="col-lg-3">

  </div>
  <div class="col-lg-3">

	</div>


	<?php

	$stm = $metodos->read("SELECT * FROM ADMINCITAS.CITA");
	$stm2 = $metodos->read2("SELECT * FROM ADMINCITAS.CITA");
 ?>
<div class="col-lg-6">

	<table class="table table-hover mt-4" id="tblTest7">
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
					echo '<td><a href="#" data-toggle="modal" data-target="#exampleModal2">Eliminar</a></td>';

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
