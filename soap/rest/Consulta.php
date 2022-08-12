<?php
	class Consulta {
		public $servidor, $basedatos, $usuario, $password;
		public function __construct($servidor, $basedatos, $usuario, $password){
			$this->servidor = $servidor;
			$this->basedatos = $basedatos;
			$this->usuario = $usuario;
			$this->password = $password;
		}
		public function getUser($emai){
			$db = mysqli_connect($this->servidor, $this->usuario, $this->password);
        	mysqli_select_db($db, "producto3");
        	$consulta = "select email, contrasena from usuarios where email ='".$emai."';";
        	echo $consulta;
        	$result = mysqli_query($db, $consulta);
        	if($result === false){
            	die ("failed");
        	}
        	if($fields = mysqli_fetch_row($result)){
				$nea = count($fields);
				for($i=0; $i<$nea; $i++){
					echo "<hr>".$fields[$i];
				}
        	}
		}
		public function postUser($email, $clave){
			$db = mysqli_connect($this->servidor, $this->usuario, $this->password);
        	mysqli_select_db($db, "producto3");
        	$consulta = "INSERT INTO usuarios (email, contrasena) VALUES ('".$email."', '".$clave."');";
        	echo $consulta;
        	if (mysqli_query($db, $consulta)) {
				echo "successfully";
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($db);
			}
		}
		public function putUser($emailOrigin, $newEmail, $newPass){
			$db = mysqli_connect($this->servidor, $this->usuario, $this->password);
        	mysqli_select_db($db, "producto3");
        	$consulta = "update usuarios set email = '".$newEmail."', contrasena ='".$newPass."' where email = '".$emailOrigin."';";
        	echo $consulta;
        	if (mysqli_query($db, $consulta)) {
				echo "successfully";
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($db);
			}
		}
		public function deleteUser($email){
			$db = mysqli_connect($this->servidor, $this->usuario, $this->password);
        	mysqli_select_db($db, "producto3");
        	$consulta = "DELETE FROM `usuarios` WHERE `usuarios`.`email` =  '".$email."';";
        	echo $consulta;
        	if (mysqli_query($db, $consulta)) {
				echo "successfully";
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($db);
			}
		}
	}
?>