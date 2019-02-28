<?php
include ('db.php');
$id_horas=$_POST['hora'];
$id_consultor= $_POST['id_consultor'];
$id_cliente= $_POST['country_id'];
$id_proy= $_POST['state_id'];
$id_sub= $_POST['city_id'];
$actividad= $_POST['actividad'];
$rol= $_POST['rol'];
$horas= $_POST['horas'];
$fecha= $_POST['fecha'];

echo $id_consultor;
echo "<br>";
echo $id_cliente;
echo "<br>";
echo $id_proy;
echo "<br>";
echo $id_sub;
echo "<br>";
echo $actividad;
echo "<br>";
echo $rol;
echo "<br>";
echo $horas;
echo "<br>";
echo $fecha;
echo "<br>";

$insertar=connect("INSERT INTO  reporhoras (id_horas, id_consultor, id_cliente, id_proy, id_sub, actividad, rol, horas, fecha, estatus)
 VALUES ('".$id_horas."','".$id_consultor."','".$id_cliente."','".$id_proy."','".$id_sub."','".$actividad."','".$rol."','".$horas."','".$fecha."','PENDIENTES')");



if($insertar)
{
 echo " <html>
 <head>
 </head>
 <body>
  <meta http-equiv='REFRESH' content='0 ; url=index.php'>
  <script>
    alert('Datos insertados con Exito');
    </script>
    </body>
    </html>";
} 
else {
  echo " <html>
 <head>
 </head>
 <body>
   <meta http-equiv='REFRESH' content='0 ; url=index.php'>
  <script>
    alert('Error al insertar los datos');
    </script>
    </body>
    </html>";
}
?>