<?php
    
    include "cn.php";

    $sql = "INSERT INTO usuario (nombre, apellidos, correo, usuario, clave) VALUES ('$_POST[nombre]', '$_POST[apellidos]', '$_POST[correo]', '$_POST[usuario]', '$_POST[clave]') ;";

    //if(isset($_POST['boton'])){
        if(empty($_POST["nombre"])){
            echo '<script lenguage="javascript">
            alert("Ingresa tu nombre"); 
            location.replace("index.html");
            </script>';
            exit();
        }
        if(empty($_POST["apellidos"])){
            echo '<script lenguage="javascript">
            alert("Ingresa tu apellido"); 
            location.replace("index.html");
            </script>';
            exit();
        }
        if(empty($_POST["correo"])){
            echo '<script lenguage="javascript">
            alert("Ingresa tu correo"); 
            location.replace("index.html");
            </script>';
            exit();
        }
        if(empty($_POST["usuario"])){
            echo '<script lenguage="javascript">
            alert("Ingresa tu usuario"); 
            location.replace("index.html");
            </script>';
            exit();
        }
        if(empty($_POST["clave"])){
            echo '<script lenguage="javascript">
            alert("Ingresa tu clave"); 
            location.replace("index.html");
            </script>';
            exit();
        }
    //}

    $regexLetras = '/^[ a-zA-ZñÑáéíóúÁÉÍÓÚ]+$/';
    $regexNumeros = '/^[0-9]+$/';
    $regexCorreo = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';

    /*if (!preg_match($regexLetras, $_POST["nombre"])) {
        echo "<script>alert('Nombre con caracteres invalidos.'); window.history.go(-1);</script>";
    }else if (!preg_match($regexLetras, $_POST["apellido"])) {
        echo "<script>alert('Apellidos con caracteres invalidos.'); window.history.go(-1);</script>";
    }else if (!preg_match($regexCorreo, $_POST["correo"])) {
        echo "<script>alert('Correo electronico con caracteres invalidos.'); window.history.go(-1);</script>";
    }else if (!preg_match($regexNumeros, $_POST["telefono"])) {
        echo "<script>alert('Telefono con caracteres invalidos.'); window.history.go(-1);</script>";
    }*/

    $verificar_usuario = mysqli_query($conn,"SELECT * From usuario where usuario = '$_POST[usuario]'");
    if(mysqli_num_rows($verificar_usuario)>0){
        echo "<script>alert('Ya existe el usuario.'); window.history.go(-1);</script>";
    }

    $verificar_correo = mysqli_query($conn,"SELECT * From usuario where correo = '$_POST[correo]'");
    if(mysqli_num_rows($verificar_correo)>0){
        echo "<script>alert('Ya existe el correo.'); window.history.go(-1);</script>";
    }

    if(!mysqli_query($conn, $sql)){
        echo "Error en la consulta: " . mysqli_error($conn);
    }else{

        mysqli_close($conn);
        
        //header("Location: index.html");
        echo "<script>alert('Usuario registrado correctamente.');location.replace('index.html');</script>";
    }
?>
