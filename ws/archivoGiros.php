#! /usr/bin/php -q
<?php
	$str_connect = ibase_connect("190.211.242.157/5678:aliadocambios_consol", "WEB02", "lucia2016");
	
	if (!empty($str_connect)) {
		$JSONData	= array();
		$sql_01		= ibase_query("SELECT * FROM SP_TRAER_TARIFA_TRANSF(1)");
		$sql_02		= ibase_query("SELECT * FROM SP_TRAER_TARIFA_TRANSF(2)");
		$sql_03		= ibase_query("SELECT * FROM SP_TRAER_TARIFA_TRANSF(3)");
		$sql_04		= ibase_query("SELECT * FROM SP_TRAER_TARIFA_TRANSF(4)");

		$contPYG	= 1;
		$contUSD	= 1;

		$detallePYG[] = array(
			'id'			=> 'pyg_0', 
			'desde_hasta'	=> 'GUARANIES', 
			'destino_1'		=> 'CDE', 
			'destino_2'		=> 'ENC', 
			'destino_3'		=> 'SDG'
		);

		$detalleUSD[] = array(
			'id'			=> 'usd_0', 
			'desde_hasta'	=> 'DOLAR', 
			'destino_1'		=> 'CDE', 
			'destino_2'		=> 'ENC', 
			'destino_3'		=> 'SDG'
		);

		while ($row_01 = ibase_fetch_row($sql_01)){
			switch ($row_01[0]) {
				case 3:
					$detalleUSD[] = array(
						'id'			=> 'usd_'.$contUSD, 
						'desde_hasta'	=> number_format($row_01[9], 0, ',', '.').' a '.number_format($row_01[10], 0, ',', '.'), 
						'destino_1'		=> number_format($row_01[7], 0, ',', '.'), 
						'destino_2'		=> number_format($row_01[8], 0, ',', '.'), 
						'destino_3'		=> number_format($row_01[6], 0, ',', '.')
					);
					$contUSD = $contUSD + 1;
					break;
				
				case 7:
					$detallePYG[] = array(
						'id'			=> 'pyg_'.$contPYG,
						'desde_hasta'	=> number_format($row_01[9], 0, ',', '.').' a '.number_format($row_01[10], 0, ',', '.'), 
						'destino_1'		=> number_format($row_01[7], 0, ',', '.'), 
						'destino_2'		=> number_format($row_01[8], 0, ',', '.'), 
						'destino_3'		=> number_format($row_01[6], 0, ',', '.')
					);
					$contPYG = $contPYG + 1;
					break;
			}
		}

		$JSONData['asuncion_pyg']	= $detallePYG;
		$JSONData['asuncion_usd']	= $detalleUSD;
		$detallePYG					= array();
		$detalleUSD					= array();

		/*CIUDAD DEL ESTE*/
		$contPYG	= 1;
		$contUSD	= 1;

		$detallePYG[] = array(
			'id'			=> 'pyg_0', 
			'desde_hasta'	=> 'GUARANIES', 
			'destino_1'		=> 'ASU', 
			'destino_2'		=> 'ENC', 
			'destino_3'		=> 'SDG'
		);

		$detalleUSD[] = array(
			'id'			=> 'usd_0', 
			'desde_hasta'	=> 'DOLAR', 
			'destino_1'		=> 'ASU', 
			'destino_2'		=> 'ENC', 
			'destino_3'		=> 'SDG'
		);

		while ($row_01 = ibase_fetch_row($sql_03)){
			switch ($row_01[0]) {
				case 3:
					$detalleUSD[] = array(
						'id'			=> 'usd_'.$contUSD, 
						'desde_hasta'	=> number_format($row_01[9], 0, ',', '.').' a '.number_format($row_01[10], 0, ',', '.'), 
						'destino_1'		=> number_format($row_01[5], 0, ',', '.'), 
						'destino_2'		=> number_format($row_01[8], 0, ',', '.'), 
						'destino_3'		=> number_format($row_01[6], 0, ',', '.')
					);
					$contUSD = $contUSD + 1;
					break;
				
				case 7:
					$detallePYG[] = array(
						'id'			=> 'pyg_'.$contPYG,
						'desde_hasta'	=> number_format($row_01[9], 0, ',', '.').' a '.number_format($row_01[10], 0, ',', '.'), 
						'destino_1'		=> number_format($row_01[5], 0, ',', '.'), 
						'destino_2'		=> number_format($row_01[8], 0, ',', '.'), 
						'destino_3'		=> number_format($row_01[6], 0, ',', '.')
					);
					$contPYG = $contPYG + 1;
					break;
			}
		}

		$JSONData['ciudaddeleste_pyg'] 	= $detallePYG;
		$JSONData['ciudaddeleste_usd'] 	= $detalleUSD;
		$detallePYG						= array();
		$detalleUSD						= array();

		/*ENCARNACION*/
		$contPYG	= 1;
		$contUSD	= 1;

		$detallePYG[] = array(
			'id'			=> 'pyg_0', 
			'desde_hasta'	=> 'GUARANIES', 
			'destino_1'		=> 'ASU', 
			'destino_2'		=> 'CDE', 
			'destino_3'		=> 'SDG'
		);

		$detalleUSD[] = array(
			'id'			=> 'usd_0', 
			'desde_hasta'	=> 'DOLAR', 
			'destino_1'		=> 'ASU', 
			'destino_2'		=> 'CDE', 
			'destino_3'		=> 'SDG'
		);

		while ($row_01 = ibase_fetch_row($sql_04)){
			switch ($row_01[0]) {
				case 3:
					$detalleUSD[] = array(
						'id'			=> 'usd_'.$contUSD, 
						'desde_hasta'	=> number_format($row_01[9], 0, ',', '.').' a '.number_format($row_01[10], 0, ',', '.'), 
						'destino_1'		=> number_format($row_01[5], 0, ',', '.'), 
						'destino_2'		=> number_format($row_01[7], 0, ',', '.'), 
						'destino_3'		=> number_format($row_01[6], 0, ',', '.')
					);
					$contUSD = $contUSD + 1;
					break;
				
				case 7:
					$detallePYG[] = array(
						'id'			=> 'pyg_'.$contPYG,
						'desde_hasta'	=> number_format($row_01[9], 0, ',', '.').' a '.number_format($row_01[10], 0, ',', '.'), 
						'destino_1'		=> number_format($row_01[5], 0, ',', '.'), 
						'destino_2'		=> number_format($row_01[7], 0, ',', '.'), 
						'destino_3'		=> number_format($row_01[6], 0, ',', '.')
					);
					$contPYG = $contPYG + 1;
					break;
			}
		}

		$JSONData['encarnacion_pyg']	= $detallePYG;
		$JSONData['encarnacion_usd'] 	= $detalleUSD;
		$detallePYG						= array();
		$detalleUSD						= array();

		/*SALTO DEL GUAIRA*/
		$contPYG	= 1;
		$contUSD	= 1;

		$detallePYG[] = array(
			'id'			=> 'pyg_0', 
			'desde_hasta'	=> 'GUARANIES', 
			'destino_1'		=> 'ASU', 
			'destino_2'		=> 'CDE', 
			'destino_3'		=> 'ENC'
		);

		$detalleUSD[] = array(
			'id'			=> 'usd_0', 
			'desde_hasta'	=> 'DOLAR', 
			'destino_1'		=> 'ASU', 
			'destino_2'		=> 'CDE', 
			'destino_3'		=> 'ENC'
		);

		while ($row_01 = ibase_fetch_row($sql_02)){
			switch ($row_01[0]) {
				case 3:
					$detalleUSD[] = array(
						'id'			=> 'usd_'.$contUSD, 
						'desde_hasta'	=> number_format($row_01[9], 0, ',', '.').' a '.number_format($row_01[10], 0, ',', '.'), 
						'destino_1'		=> number_format($row_01[5], 0, ',', '.'), 
						'destino_2'		=> number_format($row_01[7], 0, ',', '.'), 
						'destino_3'		=> number_format($row_01[8], 0, ',', '.')
					);
					$contUSD = $contUSD + 1;
					break;
				
				case 7:
					$detallePYG[] = array(
						'id'			=> 'pyg_'.$contPYG,
						'desde_hasta'	=> number_format($row_01[9], 0, ',', '.').' a '.number_format($row_01[10], 0, ',', '.'), 
						'destino_1'		=> number_format($row_01[5], 0, ',', '.'), 
						'destino_2'		=> number_format($row_01[7], 0, ',', '.'), 
						'destino_3'		=> number_format($row_01[8], 0, ',', '.')
					);
					$contPYG = $contPYG + 1;
					break;
			}
		}

		$JSONData['saltodelguaira_pyg'] = $detallePYG;
		$JSONData['saltodelguaira_usd'] = $detalleUSD;
		$detallePYG						= array();
		$detalleUSD						= array();
	}

	ibase_free_result($sql_01);
	ibase_free_result($sql_02);
	ibase_free_result($sql_03);
	ibase_free_result($sql_04);
	ibase_close($str_connect);

	$JSONData = json_encode($JSONData);
	file_put_contents("/var/www/vhosts/cambiosalberdi.com/httpdocs/alberdi/cambiosalberdi/ws/getGiroDetalle.json", $JSONData);