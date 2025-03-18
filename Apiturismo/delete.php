<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, X-Requestes-Whit, Content-Type, Accept');
header("Content-Type: application/json; charset=UTF-8");
header('Content-Type: application/json');
header("Access-Control-Allow-Headers", "Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
header("Access-Control-Allow-Methods", "GET, POST, PUT, DELETE, OPTIONS");
$json=file_get_contents('php://input');//captura el parametro en json {'id':118}
$params=json_decode($json);//paramteros
include('conexion.php');
$registros["codigo"]="-1";
$registros["mensaje"]="No se pudo eliminar";
if($_SERVER['REQUEST_METHOD']!='DELETE') //cual es el metodo de acceso
{
    $registros["mensaje"]="Error Accesos no permitido por este método";
    echo json_encode($registros);
    exit(); 
}
if(isset($params))
{
    $id=$params->id;
    $sql="DELETE from clientes where id=".$id;
    $result=$mysqli->query($sql);
    if($mysqli->affected_rows>0)//si eliminó registro
    {
        $registros["codigo"]="ok";
        $registros["mensaje"]="Registro eliminado"; 
    }
}
echo json_encode($registros);// {'id':1,'nombres':'pedro'}

?>