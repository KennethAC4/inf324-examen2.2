<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="css/estiloinicio1.css">
<link href="css/sb-admin-2.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/tabla1.css" type="text/css" media="screen">

    <meta charset="UTF-8">
    <meta name="viewport" 
    content="width=device-width, 
    initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" 
    content="ie=edge">
   
    <link href="https://fonts.googleapis.com/
    css?family=Roboto" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <link rel="stylesheet" href="https://
    use.fontawesome.com/releases/v5.7.2/css/all.css" 
    integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUSt
    jsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
    crossorigin="anonymous">
   
    <title>Kardex</title>
  </head>
<body>
    <header class="main-header">
      <div class="container container--flex">
        <a href="index.php"><h1 class="main-title"><span class="color-span">KF</span>AR</h1></a>
        <nav class="main-nav">
          <span class="icon-menu" id="btn-menu"><i class="fas fa-bars"></i></span>
          <ul class="menu" id="menu">
            <li class="menu__item"><a href="http://localhost:8080/examenwf/pantalla.php?flujo=F1&proceso=P2" class="menu__link"><span>Sorteo</span></a></li>
            <li class="menu__item"><a href="http://localhost:8080/examenwf/pantalla.php?flujo=F1&proceso=P4" class="menu__link"><span>Generar Archivo</span></a>
                <!-- <ul class="submenu">
                    <li ><a href="carrera.php"><span>Carrera informatica</span></a></li>
                    <li ><a href="kardex.php"><span>Kardex</span></a></li>
                    <li ><a href="investigacion.php"><span>instituto de investigacion</span></a></li>
			    </ul> -->
            </li>
            <li class="menu__item"><a href="https://t.me/Fabri_ac4" class="menu__link"><span>Contacto</span></a></li>
            <div class="nav-social">
              <a href="http://informatica.umsa.bo/kardex/" class="nav-social__item"><i class="fab fa-facebook-f"></i></a>
              <a href="" class="nav-social__item"><i class="fab fa-twitter"></i></a>
              <a href="" class="nav-social__item"><i class="fab fa-dribbble"></i></a>
            </div>
          </ul>
        </nav>
      </div>
    </header>

<dd>
    <h4>Archivo listo para generar</h4>
    haga click en el enalce para generar pdf <br>
    <a href="reporte.php">Reporte pdf</a>

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
                echo "<td>".$fech."</td>";
                echo "</tr>";
                //echo "<td><a href='pantalla.php?flujo=$fila[flujo]&proceso=$fila[proceso]'>ver</a></td>"; 

                
            }
            echo "</tbody>";  
            echo "</table>";
        ?>
        <!-- </dd> -->

</body>
</html>

