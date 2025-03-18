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
$registros["mensaje"]="No se pudo Actualizar";
if($_SERVER['REQUEST_METHOD']!='PUT') //cual es el metodo de acceso
{
    $registros["mensaje"]="Error Accesos no permitido por este método";
    echo json_encode($registros);
    exit(); 
}
if(isset($params))
{
    $id=$params->id;
    $nombres=$params->nombres;
    $apellidos=$params->apellidos;
    $direccion=$params->direccion;
    $telefono=$params->telefono;
    $correo=$params->correo;
    $fecha=date("Y-m-d H:i:s");// 2025-02-17 4:13 56
    $sql="UPDATE clientes SET nombres=?,apellidos=?,direccion=?,telefono=?,correo=?,modified=? WHERE id=?";
    $stmt = $mysqli->prepare($sql);
    /* Bind variables to parameters */
    $numparam = "sssssss"; //cantidad de caracteres debe ser igual al numero de parametros
    $stmt->bind_param($numparam,$nombres,$apellidos,$direccion,$telefono,$correo,$fecha,$id);
    /* Execute the statement */
    $stmt->execute();
    if($stmt->affected_rows>0)//si eliminó registro
    {
        $registros["codigo"]="ok";
        $registros["mensaje"]="Registro Actualizado"; 
    }
}
echo json_encode($registros);// {'id':1,'nombres':'pedro'}

?>