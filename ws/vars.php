<?php 

//Init sources
$ips = array("asuncion"=>"190.211.242.157/3050","villamorra"=>"201.217.23.90/3050","cde"=>"190.128.137.70/3050","salto"=>"190.128.137.70/3325","sanlo"=>"138.186.61.122/3050","cde2"=>"190.128.137.70/3333","enc"=>"201.217.23.70/3355");
$json = array();
//Init coins
$moneda = array("GUARANI"=>0,"DOLAR"=>1,"EURO"=>2,"REAL"=>3,"PESO ARGENTINO"=>4,"USDCH"=>5);
//Extras dashboards
$extra = array();
$extra["DOLARxREAL"] = array("buy"=>"DOLAR","sell"=>"REAL");
$extra["DOLARxPESO"] = array("buy"=>"DOLAR","sell"=>"PESO ARGENTINO");
$extra["EUROxDOLAR"] = array("buy"=>"EURO","sell"=>"DOLAR");

foreach ($ips as $key => $ip) {
    $con = ibase_connect($ip."/3050:aliadocambios", "WEB02", "lucia2016");

    if (!empty($con)) {
        //Init matriz
        $matriz=array();for($i=0;$i<6;$i++){$matriz[$i]=array();for($j=0; $j<6; $j++){$matriz[$i][$j]="";}}
    
        $json[$key] = $matriz;
    
        $Q = ibase_query("select m.descripcion,cm.tccomprabb,cm.tcventabb from cotizacionesmonedas cm
        left join monedas m on m.id_moneda=cm.id_moneda
        where cm.estado='A'");
        while ($R = ibase_fetch_object($Q)){
            if(array_key_exists($R->DESCRIPCION, $moneda)){
                $json[$key][$moneda['GUARANI']][$moneda[$R->DESCRIPCION]] = number_format($R->TCCOMPRABB,0, ",",".");
                $json[$key][$moneda[$R->DESCRIPCION]][$moneda['GUARANI']] = number_format($R->TCVENTABB,0, ",",".");
            }
        }
    
        //---> Dolar x Real
        $buscareal = ibase_query("select cmp.descripcion as mon1,m.descripcion as mon2,pa.paridad_c,pa.paridad_v from paridad pa
        left join monedas m on m.id_moneda=pa.id_moneda
        left join cotizacionesmonedas cm on cm.id_cotizacionmoneda=pa.id_cotizacionmoneda
        left join monedas cmp on cmp.id_moneda=cm.id_moneda where cmp.descripcion='DOLAR' AND m.descripcion='REAL'");
    
        $R = ibase_fetch_object($buscareal);
        $json[$key][$moneda['DOLAR']][$moneda['REAL']] = number_format($R->PARIDAD_C,3, ",",".");
        $json[$key][$moneda['REAL']][$moneda['DOLAR']] = number_format($R->PARIDAD_V,3, ",",".");
    
        //__> Dolar x Peso
        $buscarpeso = ibase_query("select cmp.descripcion as mon1,m.descripcion as mon2,pa.paridad_c,pa.paridad_v from paridad pa
            left join monedas m on m.id_moneda=pa.id_moneda
            left join cotizacionesmonedas cm on cm.id_cotizacionmoneda=pa.id_cotizacionmoneda
            left join monedas cmp on cmp.id_moneda=cm.id_moneda where cmp.descripcion='DOLAR' AND m.descripcion='PESO ARGENTINO'");
    
        $R = ibase_fetch_object($buscarpeso);
        $json[$key][$moneda['DOLAR']][$moneda['PESO ARGENTINO']] = number_format($R->PARIDAD_C,3, ",",".");
        $json[$key][$moneda['PESO ARGENTINO']][$moneda['DOLAR']] = number_format($R->PARIDAD_V,3, ",",".");
    
        //---> Euro x Dolar
        $buscaeuro = ibase_query("select cmp.descripcion as mon1,m.descripcion as mon2,pa.paridad_c,pa.paridad_v from paridad pa
            left join monedas m on m.id_moneda=pa.id_moneda
            left join cotizacionesmonedas cm on cm.id_cotizacionmoneda=pa.id_cotizacionmoneda
            left join monedas cmp on cmp.id_moneda=cm.id_moneda where cmp.descripcion='EURO' AND m.descripcion='DOLAR'");
    
        $R = ibase_fetch_object($buscaeuro);
        $json[$key][$moneda['EURO']][$moneda['DOLAR']] = number_format($R->PARIDAD_C,3, ",",".");
        $json[$key][$moneda['DOLAR']][$moneda['EURO']] = number_format($R->PARIDAD_V,3, ",",".");
    
        //---> Cheque
        $cheque = ibase_query("select cm.tccomprach , cm.tcventach from cotizacionesmonedas cm
        left join monedas m on m.id_moneda=cm.id_moneda
        where m.descripcion='DOLAR'");
    
        $R = ibase_fetch_object($cheque);
        $json[$key][$moneda['GUARANI']][$moneda['USDCH']] = number_format($R->PARIDAD_C,3, ",",".");
        $json[$key][$moneda['USDCH']][$moneda['GUARANI']] = number_format($R->PARIDAD_V,3, ",",".");
    }
    
    if($con) ibase_close($con);
    
}

echo json_encode($json);

// Front - End
$office = array("asuncion","villamorra","cde","salto","sanlo");
//Init coins
$monedaf = array();
$monedaf["GUARANI"] = array("index"=>0,"desc"=>"Guaraní","img"=>"guarani.png");
$monedaf["DOLAR"] = array("index"=> 1,"desc"=>"Dólar","img"=>"dolar.png");
$monedaf["EURO"] = array("index"=>2,"desc"=>"Peso Argentino","img"=>"euro.png");
$monedaf["REAL"] = array("index"=>3,"desc"=>"Real","img"=>"real.png");
$monedaf["PESO ARGENTINO"] = array("index"=>4,"desc"=>"Peso Argentino","img"=>"peso.png");
$monedaf["USDCH"] = array("index"=>5,"desc"=>"Dólar Cheque","img"=>"dolar.png");
//Extras dashboards
$extraf = array();
$extraf["DOLARxREAL"] = array("buy"=>"DOLAR","sell"=>"REAL","desc"=>"Dólar x Real","img"=>"dolar_real.jpg");
$extraf["DOLARxPESO"] = array("buy"=>"DOLAR","sell"=>"PESO ARGENTINO","desc"=>"Dólar x Peso Arg","img"=>"dolar_peso.jpg");
$extraf["EUROxDOLAR"] = array("buy"=>"EURO","sell"=>"DOLAR","desc"=>"Euro x Dólar","img"=>"euro_dolar.jpg");