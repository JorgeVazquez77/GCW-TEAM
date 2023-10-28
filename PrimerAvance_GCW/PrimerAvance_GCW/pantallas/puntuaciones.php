<?php

header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');

$servername="localhost";
$username="root";
$password="";
$dbname="graf_web";
//se abre una conexxión con phpmyadmin
$conn=new mysqli($servername,$username,$password,$dbname);
//en caso del fallo se manda un mensaje concatenado con el tipo de fallo
if($conn->connect_error){
die("no se pudo conectar vro".$conn->connect_error);
}

$sql="SELECT puntuaciones.ID_usuario, puntuaciones.ID ,usuario.Nombre, puntuaciones.Puntos FROM puntuaciones INNER JOIN usuario ON puntuaciones.ID_usuario=usuario.ID ";

$result=$conn->query($sql);

$puntuaciones=array();

if($result->num_rows>0){
    //fetch assoc es una funcion que retorna un arreglo asociativo que viene con la key y su valor
while($row=$result->fetch_assoc()){
$item=array(
    "ID_usuario"=>$row['ID_usuario'],
    "ID"=>$row['ID'],
    "Nombre"=>$row['Nombre'],
    "Puntos"=>$row['Puntos'],
    
);
//aquí se agregan al arreglo de productos
array_push($puntuaciones,$item);
}
echo json_encode($puntuaciones);
}
else{

    echo "sin resultados unu";
}
//cerrar la conexion
$conn->close();



?>