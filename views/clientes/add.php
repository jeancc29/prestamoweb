<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Access-Control-Allow-Headers: X-PINGOTHER, Content-Type, Authorization, Content-Length, X-Requested-With");
header("Access-Control-Allow-Methods: GET, POST, PUT, PATCH, DELETE, OPTIONS");
$data = json_decode(file_get_contents("php://input"));

$serverName = "DESKTOP-B2JEHIP";

/* Connect using Windows Authentication. */

if(isset($_POST['nombre'])) echo "nombre=".$_POST['nombre']."<br>"."direccion=".$_POST['direccion']."<br>"."sexo=".$_POST['sexo'];
else echo $data . "holaa";

if(!empty($data))
{
    echo $data . " holaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa0";
}

?>