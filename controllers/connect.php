

<?php
// para crear variables se utiliza el signo $ 
$nombreServidor='localhost';
$nombreUsuario='root';
$clave='';
$nombreBaseDtos='MiproyectoPHP';
//Objeto de la conexion
$con=new mysqli($nombreServidor,$nombreUsuario,$clave,$nombreBaseDtos);

//crear la condicion
if ($con->connect_error){
    die("conexion fallida".$con->connect_error);

}
//para imprimir
//echo "conexion exitosa";

?>