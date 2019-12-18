#! /usr/bin/php -q
<?php
	$ips 			= array(
		"asuncion"		=> "190.211.242.157/3050",
#		"villamorra"	=> "201.217.23.90/3050",
#		"villamorra"	=> "190.128.137.70/3051",
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
			$Q 			= ibase_query("select m.descripcion, cm.tccomprabb, cm.tcventabb
									from cotizacionesmonedas cm
									left join monedas m on m.id_moneda = cm.id_moneda
									where cm.estado = 'A'");

			$monedas 	= array(
				"DOLAR" 			=> array(
					"id"	=> "dolar",
					"desc"	=> "Dólar",
					"imagen"=> "dolar.png"
				),
				"REAL"				=> array(
					"id"	=> "real",
					"desc"	=> "Real",
					"imagen"=> "real.png"
				),
				"PESO ARGENTINO"	=> array(
					"id"	=> "peso",
					"desc"	=> "Peso",
					"imagen"=> "peso.png"
				),
				"EURO"				=> array(
					"id"	=> "euro",
					"desc"	=> "EURO",
					"imagen"=> "euro.png"
				)
			);
			
			$json 		= array();

			while ($R = ibase_fetch_object($Q)){
					if(array_key_exists($R->DESCRIPCION, $monedas)) {
						$json[] = array(
							"id" 		=> $monedas[$R->DESCRIPCION]["id"],
							"moneda" 	=> $monedas[$R->DESCRIPCION]["desc"],
							"imagen"	=> $monedas[$R->DESCRIPCION]["imagen"],
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
				"moneda"	=> "Dólar x Real",
				"imagen"	=> "dolar.png",
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
				"moneda"	=> "Dólar x EURO",
				"imagen"	=> "dolar.png",
				"compra"	=> number_format($R->PARIDAD_C, 3, ",", "."),
				"venta"		=> number_format($R->PARIDAD_V, 3, ",", ".")
			);
			
			//__> Dolar x Peso
			$buscarpeso = ibase_query("select cmp.descripcion as mon1, m.descripcion as mon2, pa.paridad_c, pa.paridad_v
									from paridad pa
									left join monedas m on m.id_moneda = pa.id_moneda
									left join cotizacionesmonedas cm on cm.id_cotizacionmoneda = pa.id_cotizacionmoneda
									left join monedas cmp on cmp.id_moneda = cm.id_moneda
									where cmp.descripcion = 'DOLAR' AND m.descripcion = 'PESO ARGENTINO'");

			$R 			= ibase_fetch_object($buscarpeso);
			$json[] 	= array(
				"id"		=> "dolar_peso",
				"moneda"	=> "Dólar x Peso",
				"imagen"	=> "dolar.png",
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
				"moneda"	=> "Dólar Cheque",
				"imagen"	=> "dolar.png",
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
				"moneda"	=> "Dólar Cheque x Real",
				"imagen"	=> "dolar.png",
				"compra"	=> number_format($R->PARIDAD_C_CH, 3, ",", "."),
				"venta"		=> number_format($R->PARIDAD_V_CH, 3, ",", ".")
			);

			$json[] 	= array(
				"id"		=> "timer",
				"moneda"	=> "Última Actualización",
				"img"		=> "timer.png",
				"compra"	=> date("d/m/Y"),
				"venta"		=> date("H:i:s")
			);

			$jsonSucursales[$sucursal]=$json;

			if($con)
					ibase_close($con);

		}

	}

	$jsonSucursales = json_encode($jsonSucursales);
	file_put_contents("/var/www/vhosts/cambiosalberdi.com/httpdocs/alberdi/cambiosalberdi/ws/getTablero.json", $jsonSucursales);