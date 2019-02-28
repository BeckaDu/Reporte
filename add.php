<?php

include "db.php";

if(isset($_GET["opt"]) && $_GET["opt"]=="country"){
	$con = connect();
	$con->query("insert into cliente(nombre_cliente) value (\"$_POST[name]\")");
	setcookie("countryadd",1);
	header("Location: new.php");
}
else if(isset($_GET["opt"]) && $_GET["opt"]=="state"){
	$con = connect();
	$con->query("insert into state(name,country_id) value (\"$_POST[name]\",$_POST[country_id])");
	setcookie("stateadd",1);
	header("Location: new.php");
}
else if(isset($_GET["opt"]) && $_GET["opt"]=="city"){
	$con = connect();
	$con->query("insert into city(name,state_id) value (\"$_POST[name]\",$_POST[state_id])");
	setcookie("cityadd",1);
	header("Location: new.php");
}
else if(isset($_GET["opt"]) && $_GET["opt"]=="all"){
	$con = connect();
	$con->query("INSERT INTO reporhoras(id_consultor, id_cliente, id_proy, id_sub, actividad, rol, horas, fecha, estatus) VALUE ($_POST[id_consultor],$_POST[country_id],$_POST[state_id],$_POST[city_id],\"$_POST[actividad]\",\"$_POST[rol]\",\"$_POST[horas]\",\"$_POST[fecha]\", \"PENDIENTES\")" );

	setcookie("comboadd",1);
	header("Location: index.php");
}
?>

/