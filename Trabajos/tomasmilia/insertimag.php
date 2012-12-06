<?php 
ini_set('display_errors', '0');     #No muestra los errores
session_start();

require_once ('config.php'); 
require_once ('DataObjects/Imagenes.php'); 


if(isset($_FILES['file'])) {  


if ($_FILES["file"]["error"] > 0)
  {
  echo "Error: " . $_FILES["file"]["error"] . "<br>";
  }
else
  {
  	$nombre =  $_FILES["file"]["name"];
  echo "Upload: " . $_FILES["file"]["name"] . "<br>";
  echo "Type: " . $_FILES["file"]["type"] . "<br>";
  echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
  echo "Stored in: " . $_FILES["file"]["tmp_name"];
  }


 if (file_exists("fotos/" . $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "fotos/" . $_FILES["file"]["name"]);
      echo "Stored in: " . "fotos/" . $_FILES["file"]["name"];
      }
    }
    

$imagen = new DO_Imagenes;
$imagen->ruta = $nombre;
$imagen->id_automoviles = $_POST['marca'];
$imagen->id_automoviles = $_POST['precio'];
$imagen->insert();





header('location: prueba.php');

?>