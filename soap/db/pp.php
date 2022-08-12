<?php
    session_start();
    if(isset($_SESSION['autentificado']) || $_SESSION['autentificado'] == "NO"){
        echo "<script>windows.location.href='autenticar.php'</script>";
    }
    echo "Hola. <hr/>"."Correo: ".$_SESSION['email']."</br>Contraseña: ".$_SESSION['contrasena'];
?>