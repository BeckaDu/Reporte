<?php
include "db.php";
$db=connect();
$query=$db->query("select * from sub_proyecto where id_proy=$_GET[state_id]");
$states = array();
while($r=$query->fetch_object()){ $states[]=$r; }
if(count($states)>0){
print "<option value=''>-- SELECCIONE --</option>";
foreach ($states as $s) {
	print "<option value='$s->id_sub'>$s->sub_proyecto</option>";
}
}else{
print "<option value=''>-- NO HAY DATOS --</option>";
}
?>