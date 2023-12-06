<link rel="stylesheet" href="css/tabla.css">
<div class="container">
    <table>
		<thead>
			<tr>
				<th>Flujo</th>
				<th>proceso</th>
				<th>Fecha inicio</th>
				<th>Accion</th>
			</tr>
		</thead>
        <tbody>
        <?php
            $link=mysqli_connect("localhost","inf324","123456","examenworkflow"); 
            session_start();
            $rol=$_SESSION["rol"];
            $usuario=$_SESSION["ci"];

            $sql="SELECT * from seguimiento where usuario='".$usuario."' and fechahorafin is null order by fechahorainicio ";
            $resultado=mysqli_query($link,$sql);

            while($fila=mysqli_fetch_array($resultado)){
                echo "<tr>";
                echo "<td>".$fila["flujo"]."</td>";
                echo "<td>".$fila["proceso"]."</td>";
                echo "<td>".$fila["fechahorainicio"]."</td>";
                echo "<td><a href='pantalla.php?flujo=$fila[flujo]&proceso=$fila[proceso]'>ver</a></td>"; 
                echo "</tr>";
            }
        ?>
        </tbody>
    </table>
</div>