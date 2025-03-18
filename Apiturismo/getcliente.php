<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, X-Requestes-Whit, Content-Type, Accept');
header("Content-Type: application/json; charset=UTF-8");
header('Content-Type: application/json');
$json=file_get_contents('php://input');//captura el parametro en json {'id':118}
$params=json_decode($json);//paramteros
include('conexion.php');
$registros["codigo"]="-1";
$registros["mensaje"]="No hay registros";
if($_SERVER['REQUEST_METHOD']!='GET') //cual es el metodo de acceso
{
    $registros["mensaje"]="Error Accesos no permitido por este método";
    echo json_encode($registros);
    exit(); 
}
$sql="select * from clientes";
//--- validar si viene parametros

if(isset($params))
{
    $id=$params->id;
    $sql="select * from clientes where id=".$id;
}
$result=$mysqli->query($sql);
if(mysqli_num_rows($result)>0)//si trajo registro
{
    $registros=mysqli_fetch_all($result,MYSQLI_ASSOC);
    // conv los reg en array asociativos
}
echo json_encode($registros);// {'id':1,'nombres':'pedro'}

?>