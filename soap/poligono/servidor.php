<?php
	require_once '../../vendor/autoload.php';
	require_once 'Punto.php';
	class Pol {
		public function calcPtosPoligonoEnCirculo($lados, $cx, $cy, $radio){
			$arrptos = Array();
			if($lados>2){
				$anginirad = 0;
				$anglado = 2 * M_PI / $lados;
				for($i=0; $i<$lados; $i++){
					$arrptos[$i] = new Punto(
						$cx + $radio * cos($anginirad),
						$cy + $radio * sin($anginirad)
					);
					$anginirad += $anglado;
				}
			}
			return $arrptos;
		}
	}
	$ac = ['uri' => "http://localhost/producto3/soap/poligono/"]; 
	$servidor = new Laminas\Soap\Server(null, $ac);
	$servidor->setClass("Pol");
	$servidor->handle();
?>