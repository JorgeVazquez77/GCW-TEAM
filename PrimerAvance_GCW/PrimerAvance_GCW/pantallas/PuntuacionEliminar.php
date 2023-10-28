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

if(isset($_POST['delete']))
    {


        if(empty($_POST['codigoDELETE']) )
        {
            echo ' Please Fill in the Blanks for deleting';
        }
        else
        {

//hacen referencia a los names de los inpits
$Codigo =  $_REQUEST['codigoDELETE'];

// Performing insert query execution
        // here our table name is college
        $sql = "DELETE FROM puntuaciones  WHERE ID=$Codigo";

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
