<link rel="stylesheet" href="css/tabla1.css">

<?php  
    $resultado=mysqli_query($link, "select * from alumnos");

    echo "<table>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>ci</td>";
    echo "<th>nombre</th>";
    echo "<th>paterno</th>";
    echo "<th>hora</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";  

    while($fila=mysqli_fetch_array($resultado)){
        echo "<tr>";
        echo "<td>".$fila["ci"]."</td>";
        echo "<td>".$fila["nombre"]."</td>";
        echo "<td>".$fila["paterno"]."</td>";
        if($fila["hora"]==null){
            $mins = array("00", "20", "40");
            $min = array_rand($mins);
            
            $fech = date("Y-m")."-".date("d")+rand(1,3)." ".rand(8,20).":".$mins[$min].":"."00";

            $link=mysqli_connect("localhost","inf324","123456","examenworkflow"); 
            $ci = $fila["ci"];

            $resultadof=mysqli_query($link, "update alumnos set hora='$fech' where ci='$ci'");  
        }else{
            $fech = $fila["hora"];
        };
        echo "<td>"."<input type='text' name='fecha' value='$fech'/>"."</td>";
        echo "</tr>";
        //echo "<td><a href='pantalla.php?flujo=$fila[flujo]&proceso=$fila[proceso]'>ver</a></td>"; 

          
    }
    echo "</tbody>";  
    echo "</table>";
?>