<?php
	header("Content-Type: image/png");
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
	
	$ancho = 2 * $_GET['r'];
	$img = imagecreate($ancho, $ancho);
	$blanco = imagecolorallocate($img, 255, 255, 255);
	$negro = imagecolorallocate($img, 0, 0, 0);
	$rojo = imagecolorallocate($img, 255, 0, 0);
	// Dibujar la elipse
	
	$nea = count($ap);
	$arrptos = array();
	for($i=0; $i<$nea; $i++){
		$arrptos[] = $ap[$i]->x;
		$arrptos[] = $ap[$i]->y;
	}
	$verde = imagecolorallocate($img, 0, 128, 0);
	$valores = array(
		$ap[0]->y, $ap[0]->x,
		$ap[1]->y, $ap[1]->x,
		$ap[2]->y, $ap[2]->x,
	);
	imagefilledpolygon($img, $arrptos, $nea, $rojo);
	// Hacer el ciclo pára mostrar del polígono y las líneas del centro a los ptos de 
	// los lados del polígono.
	// Utilizar el $ap para exhibir o dibujar el polígono
	// 2da. PARTE DEL PRODUCTO 3
	imagepng($img);
	imagedestroy($img);
	
?>
