<?php
	  require_once 'Consulta.php';
    $servidor='localhost'; 
    $basedatos='producto3';
    $usuario='root';
    $password='';
    $cad = "";
    $response = "";
    $c = new Consulta($servidor, $basedatos, $usuario, $password);
    //http://localhost/producto3/soap/rest/ejemploConsulta.php/
    switch($_SERVER['REQUEST_METHOD']){
        case 'GET':
            $cad="GET";
            $response = $c->getUser("javnol@gmail.com");
            break;
        case "POST":
            $cad="POST";
            $email = $_POST['email'];
            $clave = $_POST['clave'];
            $response = $c->postUser($email, $clave);
            break;
        case "PUT":
            parse_str(file_get_contents('php://input'), $_PUT); 
            $cad="PUT";
            $emailOrigin = $_PUT['emailorigin'];
            $email = $_PUT['email'];
            $clave = $_PUT['clave'];
            $response = $c->putUser($emailOrigin, $email, $clave);
            break;
        case 'DELETE':
            parse_str(file_get_contents('php://input'), $_PUT); 
            $cad="DELETE";
            $email = $_PUT['email'];
            $response = $c->deleteUser($email);
            break;
    }
    echo $cad;
?>