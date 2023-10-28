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

if(isset($_POST['submit']))
    {


        if(empty($_POST['idj']) || empty($_POST['puntos']))
        {
            echo ' Please Fill in the Blanks ';
        }
        else
        {

//hacen referencia a los names de los inpits
$idJugador =  $_REQUEST['idj'];
$pts =  $_REQUEST['puntos'];


// Performing insert query execution
        // here our table name is college
        $sql = "INSERT INTO puntuaciones (ID_usuario, Puntos)  VALUES ('$idJugador',
            '$pts')";

if(mysqli_query($conn, $sql)){
 
      header("location:puntuaciones.html");
      //header("refresh: 3; url = https://www.geeksforgeeks.org/");

} else{
    echo "ERROR: Hush! Sorry $sql. "
        . mysqli_error($conn);
}  

        }

 
    }

 
// Close connection
mysqli_close($conn);
?>
