<h4>Sorteo registrado correctamente</h4>

<link rel="stylesheet" href="css/tabla1.css" type="text/css" media="screen">

<div id="container">
	<div id="content">

<?php  
    $resultado=mysqli_query($link, "select * from alumnos");

    echo "<table cellspacing='0' cellpadding='0'>";
    echo "<tr>";
    echo "<th>ci</th>";
    echo "<th>nombre</th>";
    echo "<th>paterno</th>";
    echo "<th>hora</th>";
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