<?php
    session_start();
    $_SESSION['autentificado']="NO";
    if(isset($_POST['btnis']) && $_POST['btnis']){
        $db = mysqli_connect("localhost", "root", "");
        mysqli_select_db($db, "producto3");
        #$p = hash_hmac('md5', $_POST['txtpass'], 'ma2022', false);
        #$consulta = "select email, contrasena from usuarios where email='".$_POST['txtemail']."' and contrasena ='".$p."'";
        $consulta = "select email, contrasena from usuarios where email='".$_POST['txtemail']."' and contrasena ='".$_POST['txtpass']."'";
        echo $consulta."<hr/>";
        $result = mysqli_query($db, $consulta);
        if($result === false){
            echo "error";
            die ("failed");
        }
        if($fields = mysqli_fetch_row($result)){
            $_SESSION['autentificado'] = "SI";
            $_SESSION['email'] = $fields[0];
            $_SESSION['contrasena'] = $fields[1];
            echo "<script lenguaje='javascript'>window.location.href = 'pp.php';</script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
    <body>    
        <form action="autenticar.php" method='post'>
            Email <input type="text" name="txtemail"/><br/>
            Contraseña <input type="password" name="txtpass"/><br/>
            <input type="submit" name="btnis" value="Iniciar Sesión">
        </form>
    </body>
</html>