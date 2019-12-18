#! /usr/bin/php -q
<?php
	$ips 			= array(
		"asuncion"		=> "190.211.242.157/3050",
#		"villamorra"	=> "201.217.23.90/3050",
		"villamorra"	=> "190.211.241.158/3050",
		"ciudaddeleste"	=> "190.128.137.70/3050",
		"saltodelguaira"=> "190.128.137.70/3325",
		"sanlorenzo"	=> "190.128.137.70/3335",
		"km4"			=> "190.128.137.70/3333",
		"encarnacion"	=> "190.128.137.70/3334"
	);

	$jsonSucursales = array();

	foreach($ips as $sucursal=>$ip) {
		$con = ibase_connect($ip.":aliadocambios", "WEB02", "lucia2016");
		
		if (!empty($con)) {
			$Q 			= ibase_query("select m.descripcion, cm.tccomprabb, cm.tcventabb from cotizacionesmonedas cm left join monedas m on m.id_moneda = cm.id_moneda where cm.estado = 'A'");

			$monedas 	= array(
				"DOLAR" 			=> array(
					"id"	=> "dolar_estadounidense",
					"bcp"	=> "USD",
					"desc"	=> "Dólar Americano",
					"imagen"=> "dolar_estadounidense.png",
					"imaweb"=> "dolar_estadounidense.png"
				),
				"REAL"				=> array(
					"id"	=> "real_brasileno",
					"bcp"	=> "BRL",
					"desc"	=> "Real Brasileño",
					"imagen"=> "real_brasileno.png",
					"imaweb"=> "real_brasileno.png"
				),
				"PESO ARGENTINO"	=> array(
					"id"	=> "peso_argentino",
					"bcp"	=> "ARS",
					"desc"	=> "Peso Argentino",
					"imagen"=> "peso_argentino.png",
					"imaweb"=> "peso_argentino.png"
				),
				"EURO"				=> array(
					"id"	=> "euro",
					"bcp"	=> "EUR",
					"desc"	=> "EURO",
					"imagen"=> "euro.png",
					"imaweb"=> "euro.png"
				)
			);

			$json 		= array();

			while ($R = ibase_fetch_object($Q)){
				if(array_key_exists($R->DESCRIPCION, $monedas)) {
					$json[] = array(
						"id" 		=> $monedas[$R->DESCRIPCION]["id"],
						"bcp" 		=> $monedas[$R->DESCRIPCION]["bcp"],
						"moneda" 	=> $monedas[$R->DESCRIPCION]["desc"],
						"imagen"	=> $monedas[$R->DESCRIPCION]["imagen"],
						"imaweb"	=> $monedas[$R->DESCRIPCION]["imaweb"],
						"compra"	=> number_format($R->TCCOMPRABB, 0, ",", "."),
						"venta"		=> number_format($R->TCVENTABB, 0, ",", ".")
					);
				}
			}

			//---> Dolar x Real
			$buscareal 	= ibase_query("select cmp.descripcion as mon1, m.descripcion as mon2, pa.paridad_c,pa.paridad_v
									from paridad pa
									left join monedas m on m.id_moneda = pa.id_moneda
									left join cotizacionesmonedas cm on cm.id_cotizacionmoneda = pa.id_cotizacionmoneda
									left join monedas cmp on cmp.id_moneda = cm.id_moneda
									where cmp.descripcion = 'DOLAR' AND m.descripcion = 'REAL'");

			$R			= ibase_fetch_object($buscareal);
			$json[] 	= array(
				"id"		=> "dolar_real",
				"bcp" 		=> "USD -> BRL",
				"moneda"	=> "Dólar Americano x Real Brasileño",
				"imagen"	=> "dolar_estadounidense.png",
				"imaweb"	=> "dolar_real.png",
				"compra"	=> number_format($R->PARIDAD_C,3, ",", "."),
				"venta"		=> number_format($R->PARIDAD_V,3, ",", ".")
			);
			
			//---> Dolar x Euro
			$buscaeuro 	= ibase_query("select cmp.descripcion as mon1, m.descripcion as mon2, pa.paridad_c, pa.paridad_v
									from paridad pa
									left join monedas m on m.id_moneda = pa.id_moneda
									left join cotizacionesmonedas cm on cm.id_cotizacionmoneda = pa.id_cotizacionmoneda
									left join monedas cmp on cmp.id_moneda = cm.id_moneda
									where cmp.descripcion = 'EURO' AND m.descripcion = 'DOLAR'");

			$R 			= ibase_fetch_object($buscaeuro);
			$json[] 	= array(
				"id"		=> "dolar_euro",
				"bcp" 		=> "USD -> EUR",
				"moneda"	=> "Dólar Americano x EURO",
				"imagen"	=> "dolar_estadounidense.png",
				"imaweb"	=> "dolar_euro.png",
				"compra"	=> number_format($R->PARIDAD_C, 3, ",", "."),
				"venta"		=> number_format($R->PARIDAD_V, 3, ",", ".")
			);
			
			//---> Dolar x Peso
			$buscarpeso = ibase_query("select cmp.descripcion as mon1, m.descripcion as mon2, pa.paridad_c, pa.paridad_v
									from paridad pa
									left join monedas m on m.id_moneda = pa.id_moneda
									left join cotizacionesmonedas cm on cm.id_cotizacionmoneda = pa.id_cotizacionmoneda
									left join monedas cmp on cmp.id_moneda = cm.id_moneda
									where cmp.descripcion = 'DOLAR' AND m.descripcion = 'PESO ARGENTINO'");

			$R 			= ibase_fetch_object($buscarpeso);
			$json[] 	= array(
				"id"		=> "dolar_peso",
				"bcp" 		=> "USD -> ARS",
				"moneda"	=> "Dólar Americano x Peso Argentino",
				"imagen"	=> "dolar_estadounidense.png",
				"imaweb"	=> "dolar_peso_argentino.png",
				"compra"	=> number_format($R->PARIDAD_C, 3, ",", "."),
				"venta"		=> number_format($R->PARIDAD_V, 3, ",", ".")
			);

			//---> Cheque
			$cheque 	= ibase_query("select cm.tccomprach, cm.tcventach
									from cotizacionesmonedas cm
									left join monedas m on m.id_moneda = cm.id_moneda
									where m.descripcion = 'DOLAR'");

			$R 			= ibase_fetch_object($cheque);
			$json[] 	= array(
				"id"		=> "dolar_cheque",
				"bcp" 		=> "USD CHE",
				"moneda"	=> "Dólar Cheque",
				"imagen"	=> "dolar_estadounidense.png",
				"imaweb"	=> "dolar_estadounidense.png",
				"compra"	=> number_format($R->TCCOMPRACH, 0, ",", "."),
				"venta"		=> number_format($R->TCVENTACH, 0, "," ,".")
			);
			
			//---> Cheque Dolar x Real
			$chequeDoRe	= ibase_query("select cmp.descripcion as mon1, m.descripcion as mon2, pa.paridad_c_ch,pa.paridad_v_ch
									from paridad pa
									left join monedas m on m.id_moneda = pa.id_moneda
									left join cotizacionesmonedas cm on cm.id_cotizacionmoneda = pa.id_cotizacionmoneda
									left join monedas cmp on cmp.id_moneda = cm.id_moneda
									where cmp.descripcion = 'DOLAR' AND m.descripcion = 'REAL'");

			$R 			= ibase_fetch_object($chequeDoRe);
			$json[] 	= array(
				"id"		=> "dolar_real_cheque",
				"bcp" 		=> "USD CHE -> BRL",
				"moneda"	=> "Dólar Cheque x Real Brasileño",
				"imagen"	=> "dolar_estadounidense.png",
				"imaweb"	=> "dolar_real.png",
				"compra"	=> number_format($R->PARIDAD_C_CH, 3, ",", "."),
				"venta"		=> number_format($R->PARIDAD_V_CH, 3, ",", ".")
			);

			$Q 			= ibase_query("select m.descripcion, cm.tccomprabb, cm.tcventabb from cotizacionesmonedas cm left join monedas m on m.id_moneda = cm.id_moneda where cm.estado = 'A'");

			if ($sucursal == 'asuncion') {
				$monedas 	= array(
					"FRANCO SUIZO"		=> array(
						"id"	=> "franco_suizo",
						"bcp"	=> "CHF",
						"desc"	=> "Franco Suizo",
						"imagen"=> "franco_suizo.png",
						"imaweb"=> "franco_suizo.png"
					),
					"LIBRAS ESTERLINAS"	=> array(
						"id"	=> "libra_esterlina",
						"bcp"	=> "GBP",
						"desc"	=> "Libra Esterlina",
						"imagen"=> "libra_esterlina.png",
						"imaweb"=> "libra_esterlina.png"
					),
					"DOLAR CANADA"		=> array(
						"id"	=> "dolar_canadiense",
						"bcp"	=> "CAD",
						"desc"	=> "Dólar Canadiense",
						"imagen"=> "dolar_canadiense.png",
						"imaweb"=> "dolar_canadiense.png"
					),
					"YEN JAPONES"		=> array(
						"id"	=> "yen_japones",
						"bcp"	=> "JPY",
						"desc"	=> "Yen Japones",
						"imagen"=> "yen_japones.png",
						"imaweb"=> "yen_japones.png"
					),
					"PESO CHILENO"		=> array(
						"id"	=> "peso_chileno",
						"bcp"	=> "CLP",
						"desc"	=> "Peso Chileno",
						"imagen"=> "peso_chileno.png",
						"imaweb"=> "peso_chileno.png"
					),
					"PESO URUGUAYO"		=> array(
						"id"	=> "peso_uruguayo",
						"bcp"	=> "UYU",
						"desc"	=> "Peso Uruguayo",
						"imagen"=> "peso_uruguayo.png",
						"imaweb"=> "peso_uruguayo.png"
					),
					"DOLAR AUSTRALIANO"	=> array(
						"id"	=> "dolar_australiano",
						"bcp"	=> "AUD",
						"desc"	=> "Dólar Australiano",
						"imagen"=> "dolar_australiano.png",
						"imaweb"=> "dolar_australiano.png"
					)
				);

				while ($R = ibase_fetch_object($Q)){
					if(array_key_exists($R->DESCRIPCION, $monedas)) {
						if (($monedas[$R->DESCRIPCION]["id"] == 'peso_chileno') || ($monedas[$R->DESCRIPCION]["id"] == 'yen_japones') ) {
							$json[] = array(
								"id" 		=> $monedas[$R->DESCRIPCION]["id"],
								"bcp" 		=> $monedas[$R->DESCRIPCION]["bcp"],
								"moneda" 	=> $monedas[$R->DESCRIPCION]["desc"],
								"imagen"	=> $monedas[$R->DESCRIPCION]["imagen"],
								"imaweb"	=> $monedas[$R->DESCRIPCION]["imaweb"],
								"compra"	=> number_format($R->TCCOMPRABB, 2, ",", "."),
								"venta"		=> number_format($R->TCVENTABB, 2, ",", ".")
							);
						} else {
							$json[] = array(
								"id" 		=> $monedas[$R->DESCRIPCION]["id"],
								"bcp" 		=> $monedas[$R->DESCRIPCION]["bcp"],
								"moneda" 	=> $monedas[$R->DESCRIPCION]["desc"],
								"imagen"	=> $monedas[$R->DESCRIPCION]["imagen"],
								"imaweb"	=> $monedas[$R->DESCRIPCION]["imaweb"],
								"compra"	=> number_format($R->TCCOMPRABB, 0, ",", "."),
								"venta"		=> number_format($R->TCVENTABB, 0, ",", ".")
							);
						}
					}
				}
			}

			$json[] 	= array(
				"id"		=> "timer",
				"bcp" 		=> "",
				"moneda"	=> "Última Actualización",
				"img"		=> "timer.png",
				"imaweb"	=> "timer.png",
				"compra"	=> date("d/m/Y"),
				"venta"		=> date("H:i:s")
			);

			$jsonSucursales[$sucursal]=$json;

			if($con)
					ibase_close($con);

		}

	}

	$jsonSucursales = json_encode($jsonSucursales);
	file_put_contents("/var/www/vhosts/cambiosalberdi.com/httpdocs/alberdi/cambiosalberdi/ws/getTablero2.json", $jsonSucursales);