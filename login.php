<?php

use function PHPSTORM_META\elementType;

include 'cn.php';


$usuario = $_POST["usuario"];
$clave  = $_POST["clave"];




$verificar_usuario = mysqli_query($conexion, "SELECT * FROM usuario WHERE usuario='$usuario'");
if(mysqli_num_rows($verificar_usuario)>0){
  unset($_POST['correo']);
    unset($_POST['usuario']);
 

$verificar_clave = mysqli_query($conexion, "SELECT * FROM usuario WHERE clave='$clave'");
if(mysqli_num_rows($verificar_clave)>0){


    echo '<script language="javascript">alert("Usuario correcto");
    window.location="#"; 
    </script>';
    exit();


mysqli_close($conexion);
}else{
    echo '<script language="javascript">alert("Error al ingresar clave");
    window.location="login.html";
    </script>';

}
}else{
    echo '<script language="javascript">alert("Error al ingresar usuario");
    window.location="login.html";
    </script>';
}