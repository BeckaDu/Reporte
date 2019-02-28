<?php
include "db.php";
$db =  connect();
$query=$db->query("select * from cliente");
$countries = array();
while($r=$query->fetch_object()){ $countries[]=$r; }

$query2=$db->query("select * from consultor");
$consultor = array();
while($r2=$query2->fetch_object()){ $consultor[]=$r2; }

?>

<!DOCTYPE html>
<html>
<head>

	<title>Reporte de horas</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
<script type="text/javascript" src="jquery.min.js"></script>

</head>
<body>

<nav class="navbar navbar-default">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="./">Reporte</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li ><a href="./">INICIO <span class="sr-only">(current)</span></a></li>
        <li ><a href="./new.php">AGREGAR</a></li>
      </ul>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


<div class="container">
<div class="row">
<div class="col-md-12">
<h1>Reporte de horas</h1>
<?php if(isset($_COOKIE["comboadd"])):?>
<p class="alert alert-success">Registro Agregado exitosamente!</p>
<?php setcookie("comboadd",0,time()-1); endif; ?>
</div>
</div>
  <!--********************************Forma*****************************-->
<div class="row">
<div class="col-md-6">
<form method="post" action="add.php?opt=all">

   <!--********************************Consultor*****************************-->
   <div class="form-group">
    <label for="name1">Consultor</label>
    <select id="id_consultor" class="form-control" name="id_consultor" required>
      <option value="">-- SELECCIONE --</option>
<?php foreach($consultor as $s):?>
      <option value="<?php echo $s->id_consultor; ?>"><?php echo $s->nombre; ?></option>
<?php endforeach; ?>
    </select>
  </div>
  <!--********************************Cliente*****************************-->
  <div class="form-group">
    <label for="name1">Cliente</label>
    <select id="country_id" class="form-control" name="country_id" required>
      <option value="">-- SELECCIONE --</option>
<?php foreach($countries as $c):?>
      <option value="<?php echo $c->id_cliente; ?>"><?php echo $c->nombre_cliente; ?></option>
<?php endforeach; ?>
    </select>
  </div>
<!--********************************Proyecto*****************************-->	
  <div class="form-group">
    <label for="name1">Proyecto</label>
    <select id="state_id" class="form-control" name="state_id" required>
      <option value="">-- SELECCIONE --</option>
   </select>
  </div>
<!--********************************Sub Proyecto*****************************-->	
  <div class="form-group">
    <label for="name1">Sub Proyecto</label>
    <select id="city_id" class="form-control" name="city_id" required>
      <option value="">-- SELECCIONE --</option>
   </select>
  </div>
<!--********************************resto de campos*****************************-->		
<div class="form-group">
    <label for="exampleFormControlTextarea1">Descripción</label>
    <textarea class="form-control" id="actividad" name="actividad" rows="3"></textarea>
</div>
<br>
<div class="form-group">
    <label for="exampleFormControlTextarea1">Rol</label>
    <textarea class="form-control" id="rol" name="rol" rows="3"></textarea>
</div>  
<br>
<div class="form-group">
    <label for="formGroupExampleInput">Horas</label>
    <input type="text" class="form-control" id="horas" name="horas" placeholder="Cantidad de horas">
  </div>
<BR> 
<div><label>Fecha:</label></td><td><input   type="date" name="fecha" id="fecha_r"></div>
<BR>
<!--****************************************************************************-->
  <button type="submit" class="btn btn-default">Agregar</button>
</form>
</div>
</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$("#country_id").change(function(){
			$.get("get_states.php","country_id="+$("#country_id").val(), function(data){
				$("#state_id").html(data);
				console.log(data);
			});
		});

		$("#state_id").change(function(){
			$.get("get_cities.php","state_id="+$("#state_id").val(), function(data){
				$("#city_id").html(data);
				console.log(data);
			});
		});
	});
</script>
</body>
</html>