<?php
// http://localhost:8080/examenwf/pantalla.php?flujo=F1&proceso=P1
    $flujo=$_GET["flujo"];
    $proceso=$_GET["proceso"];
    $link=mysqli_connect("localhost","inf324","123456","examenworkflow");
    $resultado=mysqli_query($link, "select * from flujo where flujo='$flujo' and proceso='$proceso'");
    $fila=mysqli_fetch_array($resultado);
    $proceso=$fila["proceso"];
    $procesosiguiente=$fila["procesosiguiente"];
    //echo $fila["pantalla"];

    $archivo = $fila["pantalla"].".vista.inc.php";
?>
<!-- <iframe src="hijo.php" width="300px" height="200px"></iframe> -->
<form action="motor.php" method="GET">
<input type="hidden" name="flujo" value="<?php echo $flujo;?>"/>
<input type="hidden" name="proceso" value="<?php echo $proceso;?>"/>
<input type="hidden" name="procesosiguiente" value="<?php echo $procesosiguiente;?>"/>
<?php
include $archivo;
?>
<input type="submit" name="Anterior" value="Anterior">
<input type="submit" name="Siguiente" value="Siguiente">
</form>