<?php
    include('connect.php');
    if(isset($_POST['Registrar'])){
        $nombre=mysqli_real_escape_string($con,$_POST['Nombre']);
        $correo=mysqli_real_escape_string($con,$_POST['Corrreo']);
        $usuario=mysqli_real_escape_string($con,$_POST['Usuario']);
        $clave=mysqli_real_escape_string($con,$_POST['Clave']);
        //metodo de encriptacion
        $claveEncriptada=sha1($clave);
        //hcer una consulta para mirar si ya exixte el usuario
        $consultaUsuario="SELECT idusuarios FROM usuarios WHERE usuario='$usuario'";
        $continuar=$con->query($consultaUsuario);
        //recorrido por las filas
        $filas=$continuar->num_rows;
        if ($filas>0) {
            echo
            "<script>
                alert('el usurio ya existe')
                window.location='../views/register.html'
            </script>";
            
        }
        else{
            //insertar el usuario
            $nuevoUsuario="INSERT INTO usuarios(nombre,correo,usuario,clave) VALUES('$nombre','$correo','$usuario','$claveEncriptada')";
            $continuarUsuario=$con->query($nuevoUsuario);
            if ($continuarUsuario>0) {
                echo
                "<script>
                    alert('usuario registrado con exito')
                    window.location='../views/login.html'
                </script>";
               
            }
            else{
                echo
                "<script>
                    alert('error al registarse')
                    window.location='../views/register.html'
                </script>";   
            }
        }

    }
?>