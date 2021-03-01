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


$stm = $metodos->read("SELECT * FROM ADMINCITAS.ESPECIALIDADES");
$stm2 = $metodos->read2("SELECT * FROM ADMINCITAS.ESPECIALIDADES");

?>


<div class="row">
  <div class="container">
    <div class="col-lg-12 mt-3">

      <div class="row">


      <!-- MODAL  -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">INGRESAR ESPECIALIDAD</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

      				<form class="mt-3" method="POST" action="">
      				  <div class="form-group">
      				    <label for="especialidad">Direccion</label>
      				    <input  name="especialidad" type="text" class="form-control" id="especialidad" aria-describedby="emailHelp" placeholder="Especialidad">
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

      <!-- INGRESO ESPECIALIDADES -->
      <?php
        if (isset($_POST['especialidad'])) {
    		$especialidad = $_POST['especialidad'];
    		$metodos->execute("INSERT INTO ESPECIALIDADES VALUES ('$especialidad')");
      ?>
      <script> location.replace("especialidad.php"); </script>

      <?php } ?>

      <!-- MODAL  -->
      <div class="modal fade bd-example-modal-lg" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">LISTA DE CITAS</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

              <?php

            	$astm = $metodos->read("SELECT * FROM ADMINCITAS.CITA");
            	$astm2 = $metodos->read2("SELECT * FROM ADMINCITAS.CITA");
             ?>

            	<table class="table table-hover mt-4" id="tblTest7">
              		<thead>
                		<tr>
                  			<?php
            		    		foreach ($astm2 as $campo => $registro) {
            				?>
            		      	<th scope="col"><?php echo $campo."</th>";}?>

             			</tr>
              		</thead>
              		<tbody>
                		<?php
            				foreach ($astm as $row => $tab)
            				{
            					echo "<tr>";
            					for ($i=0; $i < count($astm2) ; $i++) {
            						echo "<td>$tab[$i] </td>";
            					}

            					echo "</tr>";
            				}
                 		?>

              		</tbody>
            	</table>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline-danger" data-dismiss="modal">CERRAR</button>
            </div>

          </div>
        </div>
      </div>

      <!-- MODAL -->
      <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">ASIGNAR ESPECIALIDAD</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

      				<form class="mt-3" method="POST" action="">
                <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <label class="input-group-text" for="inputGroupSelect01">Paciente</label>
                </div>
                  <select name="nombre" id="nombre" class="custom-select" id="inputGroupSelect01">
                    <?php
                    $stmoption = $metodos->read("SELECT ME_CEDULA, ME_NOMBRE FROM ADMINCITAS.MEDICOS ");
                    $stmoption2 = $metodos->read2("SELECT ME_CEDULA, ME_NOMBRE FROM ADMINCITAS.MEDICOS ");

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

                <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <label class="input-group-text" for="espe">Especialidad</label>
                </div>
                  <select name="espe" id="espe" class="custom-select" id="espe">
                    <?php
                    $stmoption = $metodos->read('SELECT ES_DESCRIPCION as "id", ES_DESCRIPCION as "mostrar"   FROM ADMINCITAS.ESPECIALIDADES   ');
                    $stmoption2 = $metodos->read2('SELECT ES_DESCRIPCION as "id", ES_DESCRIPCION as "mostrar"   FROM ADMINCITAS.ESPECIALIDADES  ');

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

  		if (isset($_POST['espe'])) {
  		$espe = $_POST['espe'];
  		$nombre = $_POST['nombre'];
  		$metodos->execute("INSERT INTO ADMINCITAS.ESPECIALIDAD VALUES ('$nombre','$espe')");
      }
  		?>
      <div class="col-lg-1 mb-2">
    </div>
        <div class="col-lg-3 mb-2">
          <div class="card border-dark">
            <div class="card-header">Agregar Especialidad</div>
            <div class="card-body">
                <button data-toggle="modal" data-target="#exampleModal" class="btn btn-outline-dark btn-block">Aceptar</button>
            </div>
          </div>
        </div>
        <div class="col-lg-4 mb-2">
          <div class="card border-dark">
            <div class="card-header">Ver Citas</div>
            <div class="card-body">
                <button data-toggle="modal" data-target="#exampleModal3" class="btn btn-outline-dark btn-block">Aceptar</button>
            </div>
          </div>
        </div>
        <div class="col-lg-3 mb-2">
          <div class="card border-dark">
            <div class="card-header">Asignar Especialidad</div>
            <div class="card-body">
                <button data-toggle="modal" data-target="#exampleModal2" class="btn btn-outline-dark btn-block">Aceptar</button>
            </div>
          </div>
        </div>

        <div class="col-lg-1 mb-3">

        </div>

        <hr>
        <?php foreach ($stm as $row => $tab): ?>
          <?php for ($i=0; $i < count($stm2) ; $i++){ ?>
            <div class="col-lg-3 mt-3 mb-2">
              <div class="card border-info">
                <div class="card-header"><?php echo $tab[$i]; ?></div>
                <div class="card-body">
                  <form  action="citas.php" method="post">
                    <button type="submit" name="boton" value="<?php echo $tab[$i]; ?>" class="btn btn-outline-info btn-block">Generar Cita</button>
                  </form>
                </div>
              </div>
            </div>
          <?php } ?>
        <?php endforeach; ?>
      </div>
  	</div>
  </div>
</div>



</div>
<?php
include 'shared/footer.php';



?>
