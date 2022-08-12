<?php
	require_once '../../vendor/autoload.php';
	require_once 'Punto.php';
	$url = 'http://localhost/producto3/soap/poligono/servidor.php';
	$cliente = new Laminas\Soap\Client(
		null,
		array(
			'soap_version' => 2,
			'location' => $url,
			'uri' => "http://localhost/producto3/soap/poligono/"
		)
	);
	// http://localhost/producto3/soap/poligono/cliente.php?l=3&cx=50&cy=50&r=50
	$ap = $cliente->calcPtosPoligonoEnCirculo($_GET['l'], $_GET['cx'], $_GET['cy'], $_GET['r']);
	var_dump($ap);
	
	$nea = count($ap);
	echo "<hr />El número de elementos en al arreglo de puntos es: $nea <hr />"; 
	class Punto {	 
		public $x, $y;
		public function __construct($x, $y){
			$this->x = $x;
			$this->y = $y;
		}
	}
	$points = Array();
	//echo $points;
	for($i=0; $i<$nea; $i++){
		echo "(" . $ap[$i]->x . ", " . $ap[$i]->y . ")<br />";
		array_push($points, new Punto($ap[$i]->x, $ap[$i]->y));
	}
	var_dump($points);
	$ancho = 1900;
	$alto = 1300;
	$img = imagecreate($ancho, $alto);;
	$negro = imagecolorallocate($img, 0, 0, 0);
	//$num_points = sizeof($points);
	//echo $points;
	//imageopenpolygon($img, $points, $num_points, $negro);
	
	// Utilizar el $ap para exhibir o dibujar el polígono
	// 2da. PARTE DEL PRODUCTO 3
?>