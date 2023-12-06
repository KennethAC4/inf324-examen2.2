<html>

    <h4>Archivo generado y descargado</h4>

    <?php  
    $link=mysqli_connect("localhost","inf324","123456","examenworkflow");
    $resultado=mysqli_query($link, "select * from alumnos");

    echo "<table>";
    echo "<tr>";
    echo "<td>ci</td>";
    echo "<td>nombre</td>";
    echo "<td>paterno</td>";
    echo "<td>hora</td>";
    echo "</tr>";

    while($fila=mysqli_fetch_array($resultado)){
        echo "<tr>";
        echo "<td>".$fila["ci"]."</td>";
        echo "<td>".$fila["nombre"]."</td>";
        echo "<td>".$fila["paterno"]."</td>";
        if($fila["hora"]==null){
            $mins = array("00", "20", "40");
            $min = array_rand($mins);
            
            $fech = date("Y-m")."-".date("d")+rand(1,3)." ".rand(8,20).":".$mins[$min].":"."00";
        }else{
            $fech = $fila["hora"];
        };
        echo "<td>".$fech."</td>";
        echo "</tr>";
        //echo "<td><a href='pantalla.php?flujo=$fila[flujo]&proceso=$fila[proceso]'>ver</a></td>"; 

          
    }
    echo "</table>";
?>
</html>

<?php  

require_once 'dompdf/autoload.inc.php';

$html=ob_get_clean();
// reference the Dompdf namespace
use Dompdf\Dompdf;
$dompdf = new Dompdf();

$options = $dompdf->getOptions();
$options->set(array('isRemoteEnable' => true));
$dompdf->setOptions($options);

$dompdf->loadHtml($html);

$dompdf->setPaper('letter');

$dompdf->render();

$dompdf->stream("sorteo.pdf", array("Attachment"=> True));
?>