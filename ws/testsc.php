#! /usr/bin/php -q
<?php
//$ips = array("sc"=>"190.128.137.70");
//$ips = array("en"=>"201.217.23.70");
$ips = array("asuncion"=>"190.211.242.157/3050","villamorra"=>"201.217.23.90/3050","cde"=>"190.128.137.70/3050","salto"=>"190.128.137.70/3325","sanlo"=>"138.186.61.122/3050","cde2"=>"190.128.137.70/3333","enc"=>"201.217.23.70/3355");
$jsonSucursales = array();

foreach($ips as $sucursal=>$ip) {
    //$con = ibase_connect($ip."/3333:aliadocambios", "WEB02", "lucia2016");
    $con = ibase_connect($ip.":aliadocambios", "WEB02", "lucia2016");
    if (!empty($con)) {
    // or die(ibase_errmsg());
    $Q = ibase_query("select m.descripcion,cm.tccomprabb,cm.tcventabb from cotizacionesmonedas cm
            left join monedas m on m.id_moneda=cm.id_moneda
            where cm.estado='A'");

    $monedas = array("DOLAR"=>array("desc"=>"Dólar","img"=>"dolar.png"),"REAL"=>array("desc"=>"Real","img"=>"real.png"),"PESO ARGENTINO"=>array("desc"=>"Peso Argentino","img"=>"peso.png"),"EURO"=>array("desc"=>"Euro","img"=>"euro.png"));
    $json = array();

    while ($R = ibase_fetch_object($Q)){
        if(array_key_exists($R->DESCRIPCION, $monedas)){
            $json[] = array("moneda"=>$monedas[$R->DESCRIPCION]["desc"],"img"=>$monedas[$R->DESCRIPCION]["img"],"compra"=>number_format($R->TCCOMPRABB,0, ",","."),"venta"=>number_format($R->TCVENTABB,0, ",","."));
        }
    }

    //---> Dolar x Real
    $buscareal = ibase_query("select cmp.descripcion as mon1,m.descripcion as mon2,pa.paridad_c,pa.paridad_v from paridad pa
                            left join monedas m on m.id_moneda=pa.id_moneda
                            left join cotizacionesmonedas cm on cm.id_cotizacionmoneda=pa.id_cotizacionmoneda
                            left join monedas cmp on cmp.id_moneda=cm.id_moneda where cmp.descripcion='DOLAR' AND m.descripcion='REAL'");

    $R = ibase_fetch_object($buscareal);
    $json[] = array("moneda"=>"Dólar x Real","img"=>"dolar_real.jpg","compra"=>number_format($R->PARIDAD_C,3, ",","."),"venta"=>number_format($R->PARIDAD_V,3, ",","."));

    //__> Dolar x Peso
    $buscarpeso = ibase_query("select cmp.descripcion as mon1,m.descripcion as mon2,pa.paridad_c,pa.paridad_v from paridad pa
                            left join monedas m on m.id_moneda=pa.id_moneda
                            left join cotizacionesmonedas cm on cm.id_cotizacionmoneda=pa.id_cotizacionmoneda
                            left join monedas cmp on cmp.id_moneda=cm.id_moneda where cmp.descripcion='DOLAR' AND m.descripcion='PESO ARGENTINO'");

    $R = ibase_fetch_object($buscarpeso);
    $json[] = array("moneda"=>"Dólar x Peso Arg","img"=>"dolar_peso.jpg","compra"=>number_format($R->PARIDAD_C,3, ",","."),"venta"=>number_format($R->PARIDAD_V,3, ",","."));

    //---> Euro x Dolar
    $buscaeuro = ibase_query("select cmp.descripcion as mon1,m.descripcion as mon2,pa.paridad_c,pa.paridad_v from paridad pa
                            left join monedas m on m.id_moneda=pa.id_moneda
                            left join cotizacionesmonedas cm on cm.id_cotizacionmoneda=pa.id_cotizacionmoneda
                            left join monedas cmp on cmp.id_moneda=cm.id_moneda where cmp.descripcion='EURO' AND m.descripcion='DOLAR'");

    $R = ibase_fetch_object($buscaeuro);
    $json[] = array("moneda"=>"Euro x Dólar","img"=>"euro_dolar.jpg","compra"=>number_format($R->PARIDAD_C,3, ",","."),"venta"=>number_format($R->PARIDAD_V,3, ",","."));

    //---> Cheque
    $cheque = ibase_query("select cm.tccomprach , cm.tcventach from cotizacionesmonedas cm
            left join monedas m on m.id_moneda=cm.id_moneda
            where m.descripcion='DOLAR'");

    $R = ibase_fetch_object($cheque);
    $json[] = array("moneda"=>"Dólar Cheque","img"=>"dolar.png","compra"=>number_format($R->TCCOMPRACH,0, ",","."),"venta"=>number_format($R->TCVENTACH,0, ",","."));
	
	$json[] = array("fecha"=>date("d-m-Y"),"hora"=>date("H:i:s"));

    $jsonSucursales[$sucursal]=$json;

    if($con)
        ibase_close($con);

}else{

    echo '<pre>'.ibase_errmsg().'</pre>';
}

}

echo json_encode($jsonSucursales);