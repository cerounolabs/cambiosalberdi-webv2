<?php
    header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
    header("Expires: Sat, 1 Jul 2000 05:00:00 GMT"); // Fecha en el pasado

    include ('class/curl.php');

    $tableroJSON    = get_curl('getTablero2.json');
    $JSONGiros      = get_curl('getGiroDetalle.json');
?>

<!DOCTYPE html>
<html lang="es" prefix="og: http://ogp.me/ns#">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http-equiv="Pragma" content="no-cache">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Ofrecemos servicios de Cambios de Monedas extranjeras y transferencias Nacionales e Internacionales de dinero. Contamos con sucursales y agencias en varios puntos del Paraguay. Vea la cotización del día."/>
    <meta name="robots" content="noindex,follow" />

    <meta property="og:locale" content="es_ES" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Cotización de Monedas, Cambios y Transferencias | Cambios Alberdi S.A." />
    <meta property="og:description" content="Ofrecemos servicios de Cambios de Monedas extranjeras y transferencias Nacionales e Internacionales de dinero. Contamos con sucursales y agencias en varios puntos del Paraguay. Vea la cotización del día." />
    <meta property="og:url" content="http://www.cambiosalberdi.com/" />
    <meta property="og:site_name" content="Cotización de Monedas, Cambios y Transferencias | Cambios Alberdi S.A." />
    
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:description" content="Ofrecemos servicios de Cambios de Monedas extranjeras y transferencias Nacionales e Internacionales de dinero. Contamos con sucursales y agencias en varios puntos del Paraguay. Vea la cotización del día." />
    <meta name="twitter:title" content="Cotización de Monedas, Cambios y Transferencias | Cambios Alberdi S.A." />
    <meta name="twitter:site" content="@CambiosAlberdi" />
    <meta name="twitter:creator" content="@CambiosAlberdi" />

    <link rel="shortcut icon" href="assets/images/logo/favicon.ico">
    <title>CAMBIOS ALBERDI S.A. &#8211; PY</title>
    
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" media="all" href="assets/css/simple-line-icons.css"/>
    <link rel="stylesheet" type="text/css" media="all" href="assets/css/cryptocoins.css"/>
    <link rel="stylesheet" type="text/css" media="all" href="assets/css/style-inline.css"/>
    <link rel="stylesheet" type="text/css" media="all" href="assets/css/media-screens.css"/>
    <link rel="stylesheet" type="text/css" media="all" href="assets/css/owl.carousel.css"/>
    <link rel="stylesheet" type="text/css" media="all" href="assets/css/animate.css"/>
    <link rel="stylesheet" type="text/css" media="all" href="assets/css/responsive.css"/>
    <link rel="stylesheet" type="text/css" media="all" href="assets/css/style.css"/>
    <link rel="stylesheet" type="text/css" media="all" href="assets/css/ico-fiters-style.css" />
    <link rel="stylesheet" type="text/css" media="all" href="assets/plugins/font-awesome/css/font-awesome.min.css"/>
    <link rel="stylesheet" type="text/css" media="all" href="assets/plugins/bootstrap/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" media="all" href="assets/plugins/select2/select2.min.css"/>

    <!-- CHARTS -->
    <link rel="stylesheet" type="text/css" media="all" href="assets/plugins/amcharts/export.css">
    <link rel="stylesheet" type="text/css" media="all" href="assets/plugins/amcharts/pie-chart.css">

    <!-- Fonts -->
    <link rel="stylesheet" type="text/css" media="all" href="https://fonts.googleapis.com/css?family=Open+Sans%3A300%2C400%2C600%2C700%2C800%7CRaleway%3A100%2C200%2C300%2C400%2C500%2C600%2C700%2C800%2C900%7CDroid+Serif%3A400%2C700%7CMontserrat%7CMontserrat%3Aregular%2C700%2Clatin"/>

    <!--[if IE]-->
    <style type="text/css">
        @media all and (-ms-high-contrast: none), (-ms-high-contrast: active) {
            .cryptic_preloader_holder {
                display: none !important;
            }
        }

        .footer-tablero-image {
            width: 41px;
            height: 41px;
        }

        .footer-tablero-moneda-compra {
            color: #15A346;
        }

        .footer-tablero-moneda-venta {
            color: #CC0000;
        }
    </style>
    <!--[endif]-->

    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    <!--<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5b992f5c0d4bf851"></script>-->

    <script type="text/javascript">
        if (screen.width < 600) {
            window.location.replace("http://m.cambiosalberdi.com/"); 
        }
    </script>
</head>

<body class="home page-template-default page page-child">
    <div class="cryptic_preloader_holder v2_ball_pulse">
        <div class="cryptic_preloader v2_ball_pulse">
            <div class="loaders">
                <div class="loader">
                    <div class="loader-inner ball-pulse">
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- HEADER -->
    <div id="page" class="hfeed site">
        <!-- Page content -->
        <div class="no-padding content-area no-sidebar" role="main">
        	<div class="container-fluid">
        		<div class="row entry-content">

                    <!-- Section1 - OPERACION COTIZACION -->
                    <div class="clearfix"></div>
                    <div id="operaciones" class="cryptic_ico_listing_grid padding_80 data_background text-center" data-background="assets/images/bitcurrency-members.jpg">
                        <div class="container">
                            <div class="row">
                                <div class="iconfilter-shortcode wow ">
                                    <main class="cd-main-content">
                                        <div class="cd-tab-filter-wrapper">
                                            <div class="cd-tab-filter">
                                                <ul class="cd-filters">
                                                    <li class="placeholder">
                                                        <a data-type="asuncion-ico">Todas</a>
                                                    </li>
                                                    <li class="filter" data-filter=".asuncion-ico">
                                                        <a data-type="asuncion-ico" class="selected"> ASUNCI&Oacute;N </a>
                                                    </li>
                                                    <li class="filter" data-filter=".villamorra-ico">
                                                        <a data-type="villamorra-ico"> VILLA MORRA </a>
                                                    </li>
                                                    <li class="filter" data-filter=".sanlorenzo-ico">
                                                        <a data-type="sanlorenzo-ico"> SAN LORENZO</a>
                                                    </li>
                                                    <li class="filter" data-filter=".saltodelguaira-ico">
                                                        <a data-type="saltodelguaira-ico"> SALTO DEL GUAIR&Aacute;</a>
                                                    </li>
                                                    <li class="filter" data-filter=".ciudaddeleste-ico">
                                                        <a data-type="ciudaddeleste-ico"> CIUDAD DEL ESTE</a>
                                                    </li>
                                                    <li class="filter" data-filter=".km4-ico">
                                                        <a data-type="km4-ico"> KM4 CDE</a>
                                                    </li>
                                                    <li class="filter" data-filter=".encarnacion-ico">
                                                        <a data-type="encarnacion-ico"> ENCARNACI&Oacute;N</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <section class="cd-gallery">
                                            <ul>
<?php
    foreach ($tableroJSON['asuncion'] as $tabAsuKey=>$tabAsuArray) {
        if ($tabAsuArray['bcp'] != "") {
?>
                                                <li class=" mix asuncion-ico">
                                                    <div class="col-md-12 post ">
                                                        <div class="blog_custom_listings">
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <a class="relative" href="#"><img src="assets/images/flag/<?php echo $tabAsuArray['imaweb']; ?>" /></a>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <h4 class="post-name-listings"><a href="#"><?php echo $tabAsuArray['moneda']; ?></a></h4>
                                                                    <a href="#">
                                                                        <h6 class="mt_listing_category_recent"><?php echo $tabAsuArray['bcp']; ?></h6>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="listings_details">
                                                                <div class="recent-received-goals">
                                                                    <h6><?php echo $tabAsuArray['compra']; ?> <span class="percentange"><?php echo $tabAsuArray['venta']; ?></span></h6>
                                                                </div>
                                                                <h6 class="mt_listing_interest_end_date" style="color: #15A346;"> COMPRA  <span style="color: #CC0000;">VENTA</span></h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
<?php
        }
    }

    foreach ($tableroJSON['villamorra'] as $tabVMKey=>$tabVMArray) {
        if ($tabVMArray['bcp'] != "") {
?>
                                                <li class=" mix villamorra-ico" style="display: none !important;">
                                                    <div class="col-md-12 post ">
                                                        <div class="blog_custom_listings">
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <a class="relative" href="#"><img src="assets/images/flag/<?php echo $tabVMArray['imaweb']; ?>" /></a>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <h4 class="post-name-listings"><a href="#"><?php echo $tabVMArray['moneda']; ?></a></h4>
                                                                    <a href="#">
                                                                        <h6 class="mt_listing_category_recent"><?php echo $tabVMArray['bcp']; ?></h6>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="listings_details">
                                                                <div class="recent-received-goals">
                                                                    <h6><?php echo $tabVMArray['compra']; ?> <span class="percentange"><?php echo $tabVMArray['venta']; ?></span></h6>
                                                                </div>
                                                                <h6 class="mt_listing_interest_end_date" style="color: #15A346;"> COMPRA  <span style="color: #CC0000;">VENTA</span></h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
<?php
        }
    }

    foreach ($tableroJSON['ciudaddeleste'] as $tabCDEKey=>$tabCDEArray) {
        if ($tabCDEArray['bcp'] != "") {
?>
                                                <li class=" mix ciudaddeleste-ico" style="display: none !important;">
                                                    <div class="col-md-12 post ">
                                                        <div class="blog_custom_listings">
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <a class="relative" href="#"><img src="assets/images/flag/<?php echo $tabCDEArray['imaweb']; ?>" /></a>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <h4 class="post-name-listings"><a href="#"><?php echo $tabCDEArray['moneda']; ?></a></h4>
                                                                    <a href="#">
                                                                        <h6 class="mt_listing_category_recent"><?php echo $tabCDEArray['bcp']; ?></h6>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="listings_details">
                                                                <div class="recent-received-goals">
                                                                    <h6><?php echo $tabCDEArray['compra']; ?> <span class="percentange"><?php echo $tabCDEArray['venta']; ?></span></h6>
                                                                </div>
                                                                <h6 class="mt_listing_interest_end_date" style="color: #15A346;"> COMPRA  <span style="color: #CC0000;">VENTA</span></h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
<?php
        }
    }

    foreach ($tableroJSON['saltodelguaira'] as $tabSDGKey=>$tabSDGArray) {
        if ($tabSDGArray['bcp'] != "") {
?>
                                                <li class=" mix saltodelguaira-ico" style="display: none !important;">
                                                    <div class="col-md-12 post ">
                                                        <div class="blog_custom_listings">
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <a class="relative" href="#"><img src="assets/images/flag/<?php echo $tabSDGArray['imaweb']; ?>" /></a>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <h4 class="post-name-listings"><a href="#"><?php echo $tabSDGArray['moneda']; ?></a></h4>
                                                                    <a href="#">
                                                                        <h6 class="mt_listing_category_recent"><?php echo $tabSDGArray['bcp']; ?></h6>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="listings_details">
                                                                <div class="recent-received-goals">
                                                                    <h6><?php echo $tabSDGArray['compra']; ?> <span class="percentange"><?php echo $tabSDGArray['venta']; ?></span></h6>
                                                                </div>
                                                                <h6 class="mt_listing_interest_end_date" style="color: #15A346;"> COMPRA  <span style="color: #CC0000;">VENTA</span></h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
<?php
        }
    }
    
    foreach ($tableroJSON['sanlorenzo'] as $tabSLOKey=>$tabSLOArray) {
        if ($tabSLOArray['bcp'] != "") {
?>
                                                <li class=" mix sanlorenzo-ico" style="display: none !important;">
                                                    <div class="col-md-12 post ">
                                                        <div class="blog_custom_listings">
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <a class="relative" href="#"><img src="assets/images/flag/<?php echo $tabSLOArray['imaweb']; ?>" /></a>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <h4 class="post-name-listings"><a href="#"><?php echo $tabSLOArray['moneda']; ?></a></h4>
                                                                    <a href="#">
                                                                        <h6 class="mt_listing_category_recent"><?php echo $tabSLOArray['bcp']; ?></h6>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="listings_details">
                                                                <div class="recent-received-goals">
                                                                    <h6><?php echo $tabSLOArray['compra']; ?> <span class="percentange"><?php echo $tabSLOArray['venta']; ?></span></h6>
                                                                </div>
                                                                <h6 class="mt_listing_interest_end_date" style="color: #15A346;"> COMPRA  <span style="color: #CC0000;">VENTA</span></h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
<?php
        }
    }
    
    foreach ($tableroJSON['km4'] as $tabKM4Key=>$tabKM4Array) {
        if ($tabKM4Array['bcp'] != "") {
?>
                                                <li class=" mix km4-ico" style="display: none !important;">
                                                    <div class="col-md-12 post ">
                                                        <div class="blog_custom_listings">
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <a class="relative" href="#"><img src="assets/images/flag/<?php echo $tabKM4Array['imaweb']; ?>" /></a>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <h4 class="post-name-listings"><a href="#"><?php echo $tabKM4Array['moneda']; ?></a></h4>
                                                                    <a href="#">
                                                                        <h6 class="mt_listing_category_recent"><?php echo $tabKM4Array['bcp']; ?></h6>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="listings_details">
                                                                <div class="recent-received-goals">
                                                                    <h6><?php echo $tabKM4Array['compra']; ?> <span class="percentange"><?php echo $tabKM4Array['venta']; ?></span></h6>
                                                                </div>
                                                                <h6 class="mt_listing_interest_end_date" style="color: #15A346;"> COMPRA  <span style="color: #CC0000;">VENTA</span></h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
<?php
        }
    }
    
    foreach ($tableroJSON['encarnacion'] as $tabENCKey=>$tabENCArray) {
        if ($tabENCArray['bcp'] != "") {
?>
                                                <li class=" mix encarnacion-ico" style="display: none !important;">
                                                    <div class="col-md-12 post ">
                                                        <div class="blog_custom_listings">
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <a class="relative" href="#"><img src="assets/images/flag/<?php echo $tabENCArray['imaweb']; ?>" /></a>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <h4 class="post-name-listings"><a href="#"><?php echo $tabENCArray['moneda']; ?></a></h4>
                                                                    <a href="#">
                                                                        <h6 class="mt_listing_category_recent"><?php echo $tabENCArray['bcp']; ?></h6>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="listings_details">
                                                                <div class="recent-received-goals">
                                                                    <h6><?php echo $tabENCArray['compra']; ?> <span class="percentange"><?php echo $tabENCArray['venta']; ?></span></h6>
                                                                </div>
                                                                <h6 class="mt_listing_interest_end_date" style="color: #15A346;"> COMPRA  <span style="color: #CC0000;">VENTA</span></h6>
                                                        </div>
                                                    </div>
                                                </li>
<?php
        }
    }
?>

                                            </ul>
                                            <div class="cd-fail-message">COTIZACI&Oacute;N NO DISPONIBLE</div>
                                        </section>
                                    </main>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Section2 - OPERACION CALCULADORA -->
	                <div class="clearfix"></div>
	                <div class="cryptic_coin padding_80 data_background" data-background="assets/images/background/picture7_currency.png">
	                	<div class="container">
	                		<div class="row">
                                <div class="col-sm-12">
                                    <div class="title-subtile-holder wow  ">
                                        <h1 class="section-title light_title">OPERACI&Oacute;N CALCULADORA</h1>
                                        <div class="section-subtitle light_subtitle">Ve cuanto te costar&aacute; tu operaci&oacute;n!</div>
                                    </div>
                                    <div class="spacer_80"></div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6">
                                            <figure>
                                                <img width="570" height="335" src="assets/images/cryptic-currency12.png" alt="cryptic-currency" />
                                            </figure>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <div class="exchange_calculator">
	                                            <div class="text-left">
	                                                <form id="operacion_calc" class="cp-form">                                         
                                                        <select id="ciudad_operacion" class="currency_switcher" onchange="calcOperacion(1);">
	                                                        <option value="asuncion">ASUNCI&Oacute;N</option>
                                                            <option value="villamorra">VILLA MORRA</option>
                                                            <option value="sanlorenzo">SAN LORENZO</option>
                                                            <option value="saltodelguaira">SALTO DEL GUAIR&Aacute;</option>
                                                            <option value="ciudaddeleste">CIUDAD DEL ESTE</option>
                                                            <option value="km4">KM4 CDE</option>
                                                            <option value="encarnacion">ENCARNACI&Oacute;N</option>
                                                        </select>
                                                        = SUCURSAL DE OPERACI&Oacute;N
                                                        <br />                              
                                                        <select id="moneda_tengo" class="currency_switcher" onchange="calcOperacion(1);">
                                                            <option value="PYG">GUARAN&Iacute;ES PYG</option>
                                                            <option value="USD">D&Oacute;LAR USD</option>
                                                            <option value="BRL">REAL BRL</option>
                                                            <option value="ARS">PESO ARS</option>
                                                            <option value="EUR">EURO EUR</option>
                                                        </select>
                                                        = LA MONEDA QUE TENGO
                                                        <br />
                                                        <input id="importe_tengo" type="text" class="currency1value" value="0" onchange="calcOperacion(1);"/>
                                                        = EL IMPORTE QUE TENGO
                                                        <br />
                                                        <select id="moneda_quiero" class="currency_switcher" onchange="calcOperacion(2);">
                                                            <option value="USD">D&Oacute;LAR USD</option>
                                                            <option value="PYG">GUARAN&Iacute;ES PYG</option>
                                                            <option value="BRL">REAL BRL</option>
                                                            <option value="ARS">PESO ARS</option>
                                                            <option value="EUR">EURO EUR</option>
                                                        </select>
                                                        = LA MONEDA QUE QUIERO
                                                        <br />
                                                        <input id="importe_quiero" type="text" class="currency2value" value="0" onchange="calcOperacion(2);"/>
                                                        = EL IMPORTE QUE QUIERO
	                                                </form>
	                                            </div>
	                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Section3 - GIROS NACIONALES  -->
        			<div class="clearfix"></div>
        			<div id="giros" class="cryptic_live_price padding_80 data_background" data-background="assets/images/cryptic-currency6.jpg">
        			    <div class="container">
        				    <div class="row">
			                    <div class="col-sm-12">
	                                <div class="title-subtile-holder wow ">
	                                    <h1 class="section-title dark_title">GIROS NACIONALES</h1>
	                                    <div class="section-subtitle dark_subtitle">Realizamos giros a todo el pa&iacute;s, con las mejores tarifas.</div>
	                                </div>
                                    
                                    <div class="spacer_80"></div>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-6 col-md-3">
                                            <div id="giro00" class="live-coin live-coin-v3-active text-center" onclick="initGiros(0);">
                                                <p class="text-bold no-margin">DESDE</p>
                                                <p class="text-bold no-margin" style="font-size:20px">ASUNCI&Oacute;N</p>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 col-md-3">
                                            <div id="giro01" class="live-coin live-coin-v3 text-center" onclick="initGiros(1);">
                                                <p class="text-bold no-margin">DESDE</p>
                                                <p class="text-bold no-margin" style="font-size:20px">CIUDAD DEL ESTE</p>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 col-md-3">
                                            <div id="giro02" class="live-coin live-coin-v3 text-center" onclick="initGiros(2);">
                                                <p class="text-bold no-margin">DESDE</p>
                                                <p class="text-bold no-margin" style="font-size:20px">SALTO DEL GUAIR&Aacute;</p>
                                          </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 col-md-3">
                                            <div id="giro03" class="live-coin live-coin-v3 text-center" onclick="initGiros(3);">
                                                <p class="text-bold no-margin">DESDE</p>
                                                <p class="text-bold no-margin" style="font-size:20px">ENCARNACI&Oacute;N</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="spacer_30"></div>
	                                <div class="row giro-nacional">
                                        <div class="col-sm-12 col-md-6">
                                            <div class="table table-striped background-black pricing-tables-live element-box-shadow no-margin">
                                                <table>
                                                    <tbody>
<?php
    foreach ($JSONGiros['asuncion_pyg'] as $giroASUKey=>$giroASUArray) {
?>
                                                        <tr>
                                                        <td><?php echo $giroASUArray['desde_hasta']; ?></td>
                                                        <td><?php echo $giroASUArray['destino_1']; ?></td>
                                                        <td><?php echo $giroASUArray['destino_2']; ?></td>
                                                        <td><?php echo $giroASUArray['destino_3']; ?></td>
                                                        </tr>
<?php
    }
?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="col-sm-12 col-md-6">
                                            <div class="table table-striped background-black pricing-tables-live element-box-shadow no-margin">
                                                <table>
                                                    <tbody>
<?php
    foreach ($JSONGiros['asuncion_usd'] as $giroASUKey=>$giroASUArray) {
?>
                                                        <tr>
                                                        <td><?php echo $giroASUArray['desde_hasta']; ?></td>
                                                        <td><?php echo $giroASUArray['destino_1']; ?></td>
                                                        <td><?php echo $giroASUArray['destino_2']; ?></td>
                                                        <td><?php echo $giroASUArray['destino_3']; ?></td>
                                                        </tr>
<?php
    }
?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

	                                <div class="row giro-nacional">
                                        <div class="col-sm-12 col-md-6">
                                            <div class="table table-striped background-black pricing-tables-live element-box-shadow no-margin">
                                                <table>
                                                    <tbody>
<?php
    foreach ($JSONGiros['ciudaddeleste_pyg'] as $giroASUKey=>$giroASUArray) {
?>
                                                        <tr>
                                                        <td><?php echo $giroASUArray['desde_hasta']; ?></td>
                                                        <td><?php echo $giroASUArray['destino_1']; ?></td>
                                                        <td><?php echo $giroASUArray['destino_2']; ?></td>
                                                        <td><?php echo $giroASUArray['destino_3']; ?></td>
                                                        </tr>
<?php
    }
?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="col-sm-12 col-md-6">
                                            <div class="table table-striped background-black pricing-tables-live element-box-shadow no-margin">
                                                <table>
                                                    <tbody>
<?php
    foreach ($JSONGiros['ciudaddeleste_usd'] as $giroASUKey=>$giroASUArray) {
?>
                                                        <tr>
                                                        <td><?php echo $giroASUArray['desde_hasta']; ?></td>
                                                        <td><?php echo $giroASUArray['destino_1']; ?></td>
                                                        <td><?php echo $giroASUArray['destino_2']; ?></td>
                                                        <td><?php echo $giroASUArray['destino_3']; ?></td>
                                                        </tr>
<?php
    }
?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

	                                <div class="row giro-nacional">
                                        <div class="col-sm-12 col-md-6">
                                            <div class="table table-striped background-black pricing-tables-live element-box-shadow no-margin">
                                                <table>
                                                    <tbody>
<?php
    foreach ($JSONGiros['saltodelguaira_pyg'] as $giroASUKey=>$giroASUArray) {
?>
                                                        <tr>
                                                        <td><?php echo $giroASUArray['desde_hasta']; ?></td>
                                                        <td><?php echo $giroASUArray['destino_1']; ?></td>
                                                        <td><?php echo $giroASUArray['destino_2']; ?></td>
                                                        <td><?php echo $giroASUArray['destino_3']; ?></td>
                                                        </tr>
<?php
    }
?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="col-sm-12 col-md-6">
                                            <div class="table table-striped background-black pricing-tables-live element-box-shadow no-margin">
                                                <table>
                                                    <tbody>
<?php
    foreach ($JSONGiros['saltodelguaira_usd'] as $giroASUKey=>$giroASUArray) {
?>
                                                        <tr>
                                                        <td><?php echo $giroASUArray['desde_hasta']; ?></td>
                                                        <td><?php echo $giroASUArray['destino_1']; ?></td>
                                                        <td><?php echo $giroASUArray['destino_2']; ?></td>
                                                        <td><?php echo $giroASUArray['destino_3']; ?></td>
                                                        </tr>
<?php
    }
?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>


	                                <div class="row giro-nacional">
                                        <div class="col-sm-12 col-md-6">
                                            <div class="table table-striped background-black pricing-tables-live element-box-shadow no-margin">
                                                <table>
                                                    <tbody>
<?php
    foreach ($JSONGiros['encarnacion_pyg'] as $giroASUKey=>$giroASUArray) {
?>
                                                        <tr>
                                                        <td><?php echo $giroASUArray['desde_hasta']; ?></td>
                                                        <td><?php echo $giroASUArray['destino_1']; ?></td>
                                                        <td><?php echo $giroASUArray['destino_2']; ?></td>
                                                        <td><?php echo $giroASUArray['destino_3']; ?></td>
                                                        </tr>
<?php
    }
?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="col-sm-12 col-md-6">
                                            <div class="table table-striped background-black pricing-tables-live element-box-shadow no-margin">
                                                <table>
                                                    <tbody>
<?php
    foreach ($JSONGiros['encarnacion_usd'] as $giroASUKey=>$giroASUArray) {
?>
                                                        <tr>
                                                        <td><?php echo $giroASUArray['desde_hasta']; ?></td>
                                                        <td><?php echo $giroASUArray['destino_1']; ?></td>
                                                        <td><?php echo $giroASUArray['destino_2']; ?></td>
                                                        <td><?php echo $giroASUArray['destino_3']; ?></td>
                                                        </tr>
<?php
    }
?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
			                    </div>
			                </div>
			            </div>
                    </div>

                    <!-- Section4 - GIROS CALCULADORA -->
	                <div class="clearfix"></div>
	                <div class="cryptic_coin padding_80 data_background" data-background="assets/images/background/picture7_currency.png">
	                	<div class="container">
	                		<div class="row">
                                <div class="col-sm-12">
                                    <div class="title-subtile-holder wow  ">
                                        <h1 class="section-title light_title">GIROS NACIONALES CALCULADORA</h1>
                                        <div class="section-subtitle light_subtitle">Ve cuanto te costar&aacute; tu Giro Nacional!</div>
                                    </div>
                                    <div class="spacer_80"></div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6">
                                            <figure>
                                                <img width="570" height="335" src="assets/images/cryptic-currency12.png" alt="cryptic-currency" />
                                            </figure>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <div class="exchange_calculator">
	                                            <div class="text-left">
	                                                <form id="giros_calc" class="cp-form">                                         
                                                        <select id="ciudad_envia" class="currency_switcher" onchange="calcGiros();">
	                                                        <option value="1">ASUNCI&Oacute;N</option>
                                                            <option value="2">CIUDAD DEL ESTE</option>
                                                            <option value="3">ENCARNACI&Oacute;N</option>
                                                            <option value="4">SALTO DEL GUAIR&Aacute;</option>
                                                        </select>
                                                         = CIUDAD DE ENV&Iacute;O
                                                        <br />                              
                                                        <select id="ciudad_recibe" class="currency_switcher" onchange="calcGiros();">
	                                                        <option value="1">ASUNCI&Oacute;N</option>
                                                            <option value="2">CIUDAD DEL ESTE</option>
                                                            <option value="3">ENCARNACI&Oacute;N</option>
                                                            <option value="4">SALTO DEL GUAIR&Aacute;</option>
                                                        </select>
                                                        = CIUDAD PARA RECIBIR
                                                        <br /> 
                                                        <select id="moneda_envia" class="currency_switcher" onchange="calcGiros();">
	                                                        <option value="1">D&Oacute;LAR USD</option>
                                                            <option value="2">GUARAN&Iacute;ES PYG</option>
                                                        </select>
                                                        = MONEDA QUE SE ENVIA
                                                        <br /> 
	                                                    <input id="importe_envia" type="text" class="currency1value" value="1" onchange="calcGiros();"/>
                                                        = IMPORTE QUE SE ENVIA
                                                        <br />
	                                                    <input id="importe_costo" type="text" class="currency2value" value="0" onchange="calcGiros();" realonly disabled/>
                                                        = COSTO DEL ENV&Iacute;O
	                                                    
	                                                </form>
	                                            </div>
	                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Section5 - NUESTRA HISTORIA -->
	                <div class="clearfix"></div>
                    <div id="nosotros" class="cryptic_milestones padding_80 data_background" data-background="assets/images/bitcurrency-members.jpg">
                    	<div class="container">
                    		<div class="row">
                                <div class="col-sm-12">
                                    <div class="title-subtile-holder wow  fadeIn">
                                        <h1 class="section-title dark_title">NUESTRA HISTORIA</h1>
                                        <div class="section-subtitle dark_subtitle">Nuestra compañía CAMBIOS ALBERDI S.A.</div>
                                    </div>
                                    <div class="spacer_40"></div>
                                    <div class="clearfix"></div>
                                    <section id="cd-timeline" class=" cd-container ">
                                        <div class="mt_shortcode_timeline_items cd-timeline-block">
                                            <div class="cd-timeline-img cd-picture  bounce-in"><img src="assets/images/logo/logo_icon.png" alt="cryptic-icon"></div>
                                            <!-- cd-timeline-img -->
                                            <div class="cd-timeline-content  bounce-in">
                                                <h3 class="timeline_item_title  bounce-in">Casa Matriz</h3>
                                                <p class="cd-date  bounce-in">MAYO 1989</p>
                                            </div>
                                            <!-- cd-timeline-content -->
                                        </div>
                                        <div class="mt_shortcode_timeline_items cd-timeline-block">
                                            <div class="cd-timeline-img cd-picture"><img src="assets/images/logo/logo_icon.png" alt="cryptic-icon"></div>
                                            <!-- cd-timeline-img -->
                                            <div class="cd-timeline-content">
                                                <h3 class="timeline_item_title">Sucursal CDE 1</h3>
                                                <p class="cd-date">MAYO 1989</p>
                                            </div>
                                            <!-- cd-timeline-content -->
                                        </div>
                                        <div class="mt_shortcode_timeline_items cd-timeline-block">
                                            <div class="cd-timeline-img cd-picture"><img src="assets/images/logo/logo_icon.png" alt="cryptic-icon"></div>
                                            <!-- cd-timeline-img -->
                                            <div class="cd-timeline-content">
                                                <h3 class="timeline_item_title">Sucursal Salto del Guair&aacute;</h3>
                                                <p class="cd-date">NOVIEMBRE 2010</p>
                                            </div>
                                            <!-- cd-timeline-content -->
                                        </div>
                                        <div class="mt_shortcode_timeline_items cd-timeline-block">
                                            <div class="cd-timeline-img cd-picture"><img src="assets/images/logo/logo_icon.png" alt="cryptic-icon"></div>
                                            <!-- cd-timeline-img -->
                                            <div class="cd-timeline-content">
                                                <h3 class="timeline_item_title">Sucursal Villa Morra</h3>
                                                <p class="cd-date">AGOSTO 2016</p>
                                            </div>
                                            <!-- cd-timeline-content -->
                                        </div>
                                        <div class="mt_shortcode_timeline_items cd-timeline-block">
                                            <div class="cd-timeline-img cd-picture"><img src="assets/images/logo/logo_icon.png" alt="cryptic-icon"></div>
                                            <!-- cd-timeline-img -->
                                            <div class="cd-timeline-content">
                                                <h3 class="timeline_item_title">Agencia San Lorenzo</h3>
                                                <p class="cd-date">FEBRERO 2017</p>
                                            </div>
                                            <!-- cd-timeline-content -->
                                        </div>
                                        <div class="mt_shortcode_timeline_items cd-timeline-block">
                                            <div class="cd-timeline-img cd-picture"><img src="assets/images/logo/logo_icon.png" alt="cryptic-icon"></div>
                                            <!-- cd-timeline-img -->
                                            <div class="cd-timeline-content">
                                                <h3 class="timeline_item_title">Agencia KM4</h3>
                                                <p class="cd-date">OCTUBRE 2017</p>
                                            </div>
                                            <!-- cd-timeline-content -->
                                        </div>
                                        <div class="mt_shortcode_timeline_items cd-timeline-block">
                                            <div class="cd-timeline-img cd-picture"><img src="assets/images/logo/logo_icon.png" alt="cryptic-icon"></div>
                                            <!-- cd-timeline-img -->
                                            <div class="cd-timeline-content">
                                                <h3 class="timeline_item_title">Sucursal Encarnaci&oacute;n</h3>
                                                <p class="cd-date">FEBRERO 2018</p>
                                            </div>
                                            <!-- cd-timeline-content -->
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Section6 - RANGO -->
	                <div class="clearfix"></div>
	                <div class="cryptic_transactions padding_80 data_background" data-background="assets/images/counter.jpg">
	                	<div class="container">
	                		<div class="row">
                                <div class="col-sm-3">
                                    <div class="stats-block statistics wow fadeIn">
                                        <div class="stats-head">
                                            <p class="stat-number skill"></p>
                                        </div>
                                        <div class="stats-content percentage text-white" data-perc="30"><span class="skill-count no-margin">30</span>
                                            <p class="text-white">A&ntilde;os de Experiencia</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="stats-block statistics wow fadeIn">
                                        <div class="stats-head">
                                            <p class="stat-number skill"></p>
                                        </div>
                                        <div class="stats-content percentage text-white" data-perc="12"><span class="skill-count no-margin">12</span>
                                            <p class="text-white">Sucursales y Agencias</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="stats-block statistics wow fadeIn">
                                        <div class="stats-head">
                                            <p class="stat-number skill"></p>
                                        </div>
                                        <div class="stats-content percentage text-white" data-perc="45216"><span class="skill-count no-margin">45216</span>
                                            <p class="text-white">Operaciones Compra - Venta - Arbitraje</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="stats-block statistics wow fadeIn">
                                        <div class="stats-head">
                                            <p class="stat-number skill"></p>
                                        </div>
                                        <div class="stats-content percentage text-white" data-perc="7854"><span class="skill-count no-margin">7854</span>
                                            <p class="text-white">Giros Nacionales</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Section7 - SUCURSALES -->
	                <div class="clearfix"></div>
	                <div id="sucursales" class="cryptic_our_team padding_80 data_background" data-background="assets/images/bitcurrency-members.jpg">
	                	<div class="container">
	                		<div class="row">
                                <div class="col-sm-12">
                                    <div class="title-subtile-holder wow  ">
                                        <h1 class="section-title dark_title no-margin">SUCURSALES</h1>
                                        <div class="section-subtitle dark_subtitle"> Para su comodidad contamos con varias sucursales cerca suyo!</div>
                                    </div>
                                    <div class="spacer_80"></div>
                                    <div class="row wow fadeIn">
                                        <div class="col-md-4 relative">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <div class="members_img_holder">
                                                        <div class="memeber01-img-holder"><img src="assets/images/sucursal/casa_matriz.png" alt="CASA MATRIZ" /></div>
                                                        <div class="member01-content">
                                                            <div class="member01-content-inside">
                                                                <h3 class="member01_name">CASA MATRIZ</h3>
                                                                <h5 class="member01_position">Alberdi Nº 247 e/ Pte. Franco y Palma - Asunción</h5>
                                                                <h5 class="member01_position">(021) 447.003 / (021) 447.004</h5>
					                                        </div>
					                                    </div>
					                                </div>
					                            </div>
					                        </div>
					                    </div>

					                    <div class="col-md-4 relative">
					                        <div class="row">
					                            <div class="col-md-12 col-sm-12 col-xs-12">
					                                <div class="members_img_holder">
					                                    <div class="memeber01-img-holder"><img src="assets/images/sucursal/suc_villa_morra.png" alt="SUCURSAL VILLA MORRA" /></div>
					                                    <div class="member01-content">
                                                            <div class="member01-content-inside">
                                                                <h3 class="member01_name">SUCURSAL VILLA MORRA</h3>
                                                                <h5 class="member01_position">Mariscal López N°4217 C/ Capitán Motta - Asunción</h5>
                                                                <h5 class="member01_position">(021) 609.905 / (021) 609.906</h5>
					                                        </div>
					                                    </div>
					                                </div>
					                            </div>
					                        </div>
					                    </div>

					                    <div class="col-md-4 relative">
					                        <div class="row">
					                            <div class="col-md-12 col-sm-12 col-xs-12">
					                                <div class="members_img_holder">
					                                    <div class="memeber01-img-holder"><img src="assets/images/sucursal/suc_ciudad_del_este.png" alt="SUCURSAL 1 CDE" /></div>
					                                    <div class="member01-content">
                                                            <div class="member01-content-inside">
                                                                <h3 class="member01_name">SUCURSAL 1 CDE</h3>
                                                                <h5 class="member01_position">Monseñor Rodríguez esq. Pampliega – Ciudad del Este</h5>
                                                                <h5 class="member01_position">(061) 500.135 / (061) 500.417</h5>
					                                        </div>
					                                    </div>
					                                </div>
					                            </div>
					                        </div>
                                        </div>
                                    </div>
                                    
                                    <div class="spacer_30"></div>

                                    <div class="row wow fadeIn">
                                        <div class="col-md-4 relative">
					                        <div class="row">
					                            <div class="col-md-12 col-sm-12 col-xs-12">
					                                <div class="members_img_holder">
					                                    <div class="memeber01-img-holder"><img src="assets/images/sucursal/suc_salto.png" alt="SUCURSAL 4 SALTO DEL GUAIR&Aacute;" /></div>
					                                    <div class="member01-content">
                                                            <div class="member01-content-inside">
                                                                <h3 class="member01_name">SUCURSAL 4 SALTO DEL GUAIR&Aacute;</h3>
                                                                <h5 class="member01_position">Avda. Paraguay Nº 686 c/ Carlos Ricardo Mendes Goncalves – Salto del Guairá</h5>
                                                                <h5 class="member01_position">(046) 243.158 / (046) 243.159</h5>
					                                        </div>
					                                    </div>
					                                </div>
					                            </div>
					                        </div>
                                        </div>
                                        
                                        <div class="col-md-4 relative">
					                        <div class="row">
					                            <div class="col-md-12 col-sm-12 col-xs-12">
					                                <div class="members_img_holder">
					                                    <div class="memeber01-img-holder"><img src="assets/images/sucursal/suc_encarnacion.png" alt="SUCURSAL 7 ENCARNACI&Oacute;N" /></div>
					                                    <div class="member01-content">
                                                            <div class="member01-content-inside">
                                                                <h3 class="member01_name">SUCURSAL 7 ENCARNACI&Oacute;N</h3>
                                                                <h5 class="member01_position">Mcal. Estigarribia 1436 entre Villarica y Tomas R. Pereira – Encarnación</h5>
                                                                <h5 class="member01_position">(071) 205.154 / (071) 205.120</h5>
					                                        </div>
					                                    </div>
					                                </div>
					                            </div>
					                        </div>
                                        </div>
                                        
                                        <div class="col-md-4 relative">
					                        <div class="row">
					                            <div class="col-md-12 col-sm-12 col-xs-12">
					                                <div class="members_img_holder">
					                                    <div class="memeber01-img-holder"><img src="assets/images/sucursal/age_rubio_nu.png" alt="AGENCIA 1 CDE RUBIO &Ntilde;U" /></div>
					                                    <div class="member01-content">
                                                            <div class="member01-content-inside">
                                                                <h3 class="member01_name">AGENCIA 1 CDE RUBIO &Ntilde;U</h3>
                                                                <h5 class="member01_position">Rubio Ñu c/ Monseñor Rodríguez – Ciudad del Este</h5>
                                                                <h5 class="member01_position">(061) 512.493 / (061) 514.399</h5>
					                                        </div>
					                                    </div>
					                                </div>
					                            </div>
					                        </div>
					                    </div>
                                    </div>
                                    
                                    <div class="spacer_30"></div>

                                    <div class="row wow fadeIn">
                                        <div class="col-md-4 relative">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <div class="members_img_holder">
                                                        <div class="memeber01-img-holder"><img src="assets/images/sucursal/age_jebai.png" alt="AGENCIA 2 CDE JEBAI" /></div>
                                                        <div class="member01-content">
                                                            <div class="member01-content-inside">
                                                                <h3 class="member01_name">AGENCIA 2 CDE JEBAI</h3>
                                                                <h5 class="member01_position">Regimiento Piribebuy e/ Monseñor Rodríguez y Adrián Jara – Local 3009/10 – Galería Jebai Center II – Ciudad del Este</h5>
                                                                <h5 class="member01_position">(061) 506.060 / (061) 501.081</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 relative">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <div class="members_img_holder">
                                                        <div class="memeber01-img-holder"><img src="assets/images/sucursal/age_lailai.png" alt="AGENCIA 3 CDE LAI LAI" /></div>
                                                        <div class="member01-content">
                                                            <div class="member01-content-inside">
                                                                <h3 class="member01_name">AGENCIA 3 CDE LAI LAI</h3>
                                                                <h5 class="member01_position">Adrian Jara esq. Itá Ybate – Salón Nº 1 Planta Baja – Galería Lai Lai – Ciudad del Este</h5>
                                                                <h5 class="member01_position">(061) 501.362 / (061) 501.368</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 relative">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <div class="members_img_holder">
                                                        <div class="memeber01-img-holder"><img src="assets/images/sucursal/age_salto.png" alt="AGENCIA 4 SALTO DEL GUAIR&Aacute;" /></div>
                                                        <div class="member01-content">
                                                            <div class="member01-content-inside">
                                                                <h3 class="member01_name">AGENCIA 4 SALTO DEL GUAIR&Aacute;</h3>
                                                                <h5 class="member01_position">Avda. Paraguay c/ Pedro Juan Caballero – Salto del Guairá</h5>
                                                                <h5 class="member01_position">(046) 242.927 / (046) 243.187</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="spacer_30"></div>

                                    <div class="row wow fadeIn">
                                        <div class="col-md-4 relative">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <div class="members_img_holder">
                                                        <div class="memeber01-img-holder"><img src="assets/images/sucursal/age_uniamerica.png" alt="AGENCIA 5 CDE UNIAMERICA" /></div>
                                                        <div class="member01-content">
                                                            <div class="member01-content-inside">
                                                                <h3 class="member01_name">AGENCIA 5 CDE UNIAMERICA</h3>
                                                                <h5 class="member01_position">Avda. Itá Ybate – Galería Uniamerica – Ciudad del Este</h5>
                                                                <h5 class="member01_position">(061) 511.392 / (061) 511.393</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 relative">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <div class="members_img_holder">
                                                        <div class="memeber01-img-holder"><img src="assets/images/sucursal/age_san_lorenzo.png" alt="AGENCIA 6 SAN LORENZO" /></div>
                                                        <div class="member01-content">
                                                            <div class="member01-content-inside">
                                                                <h3 class="member01_name">AGENCIA 6 SAN LORENZO</h3>
                                                                <h5 class="member01_position">Julia Miranda Cueto c/ Mcal. Estigarribia – San Lorenzo</h5>
                                                                <h5 class="member01_position">(021) 571.215 / (021) 571.216</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 relative">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <div class="members_img_holder">
                                                        <div class="memeber01-img-holder"><img src="assets/images/sucursal/age_km4.png" alt="AGENCIA 7 CDE KM 4" /></div>
                                                        <div class="member01-content">
                                                            <div class="member01-content-inside">
                                                                <h3 class="member01_name">AGENCIA 7 CDE KM 4</h3>
                                                                <h5 class="member01_position">Super Carretera Fco Solano Lopez c/Fortin Pirizal – Ciudad del Este</h5>
                                                                <h5 class="member01_position">(061) 571.540 / (061) 571.536</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
    							</div>
    						</div>
    					</div>
    				</div>

                    <!-- Section8 - CONTACTOS -->
                    <div class="clearfix"></div>
                    <div id="contactos" class="cryptic_our_team_ico padding_80 data_background" data-background="assets/images/counter.jpg">
	                	<div class="container">
	                		<div class="row">
                                <div class="col-sm-12">
						            <div class="title-subtile-holder wow fadeIn text_center">
						               <h1 class="section-title light_title">CONTACTOS</h1>
									</div>
                                    <div class="spacer_80"></div>
                                    <div class="col-sm-3 col-lg-2">
                                        <div class="social-icon-box vc_row wow fadeIn">
				                           <div class="social-icon-box-holder text-white background_github">
				                              <i class="list_icon fa fa-envelope-open-o"></i>
				                              <h3 class="list_title_text">Email</h3>
				                              <a target="_blank" href="mailto:matriz@cambiosalberdi.com?subject=Contacto - Cambios Alberdi" class="list_button_text text-white">ENVIAR<i class="list_button_icon fa fa-long-arrow-right"></i>
				                              </a>
				                           </div>
				                  		</div>
                                    </div>
					                <div class="col-sm-3 col-lg-2">
				                        <div class="social-icon-box vc_row wow fadeIn">
				                           <div class="social-icon-box-holder text-white background_facebook">
				                              <i class="list_icon fa fa-facebook"></i>
				                              <h3 class="list_title_text">Facebook</h3>
				                              <a target="_blank" href="https://www.facebook.com/CambiosAlberdi/" class="list_button_text text-white">SEGUIR<i class="list_button_icon fa fa-long-arrow-right"></i>
				                              </a>
				                           </div>
				                  		</div>
                                    </div>
                                    <div class="col-sm-3 col-lg-2">
				                        <div class="social-icon-box vc_row wow fadeIn">
				                           <div class="social-icon-box-holder text-white background_whatsapp">
				                              <i class="list_icon fa fa-whatsapp"></i>
				                              <h3 class="list_title_text">WhatsApp</h3>
				                              <a target="_blank" href="https://api.whatsapp.com/send?phone=595981987002" class="list_button_text text-white">SEGUIR<i class="list_button_icon fa fa-long-arrow-right"></i>
				                              </a>
				                           </div>
				                  		</div>
                                    </div>
					                <div class="col-sm-3 col-lg-2">
				                        <div class="social-icon-box vc_row wow fadeIn">
				                           <div class="social-icon-box-holder text-white background_twitter">
				                              <i class="list_icon fa fa-twitter"></i>
				                              <h3 class="list_title_text">Twitter</h3>
				                              <a target="_blank" href="https://twitter.com/cambiosalberdi" class="list_button_text text-white">SEGUIR<i class="list_button_icon fa fa-long-arrow-right"></i>
				                              </a>
				                           </div>
					                    </div>
                                    </div>
					                <div class="col-sm-3 col-lg-2">
				                        <div class="social-icon-box vc_row wow fadeIn">
				                           <div class="social-icon-box-holder text-white background_bitcoinTalk">
				                              <i class="list_icon fa fa-instagram"></i>
				                              <h3 class="list_title_text">Instagram</h3>
				                              <a target="_blank" href="https://www.instagram.com/cambiosalberdi/" class="list_button_text text-white">SEGUIR<i class="list_button_icon fa fa-long-arrow-right"></i>
				                              </a>
				                           </div>
					                    </div>
					                </div>
                                    <div class="col-sm-3 col-lg-2">
				                        <div class="social-icon-box vc_row wow fadeIn">
				                           <div class="social-icon-box-holder text-white background_call">
				                              <i class="list_icon fa fa-phone"></i>
				                              <h3 class="list_title_text">Llamar</h3>
				                              <a target="_blank" href="tel:+595981987002" class="list_button_text text-white">LLAMAR<i class="list_button_icon fa fa-long-arrow-right"></i>
				                              </a>
				                           </div>
					                    </div>
					                </div>
    							</div>
    						</div>
    					</div>
    				</div>

                    <!-- Section9 - OTROS SERVICIOS -->
	                <div class="clearfix"></div>
                    <div id="servicios" class="cryptic_news padding_80">
                    	<div class="container">
                    		<div class="row">
                                <div class="col-sm-12">
                                    <div class="title-subtile-holder wow  ">
                                        <h1 class="section-title dark_title">OTROS SERVICIOS</h1>
                                        <div class="section-subtitle dark_subtitle">Tambi&eacute;n ofrecemos otros servicios para su comodidad.</div>
                                    </div>
                                    <div class="spacer_80"></div>
                                    <div class="blog-posts simple-posts blog-posts-shortcode wow fadeIn">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <article class="single-post list-view  no-padding no-margin">
                                                    <div class="blog_custom">
                                                        <!-- POST THUMBNAIL -->
                                                        <div class="col-md-12 post-thumbnail">
                                                            <a class="relative" href="#"><img class="blog_post_image" src="assets/images/servicio/pe1.png" alt="What is Bitcoin Mining" /></a>
                                                            <span class="time-n-date">PAGOExpress</span>
                                                        </div>
                                                    </div>
                                                </article>
                                            </div>
                                            <div class="col-sm-4">
                                                <article class="single-post list-view  no-padding no-margin">
                                                    <div class="blog_custom">
                                                        <!-- POST THUMBNAIL -->
                                                        <div class="col-md-12 post-thumbnail">
                                                            <a class="relative" href="#"><img class="blog_post_image" src="assets/images/servicio/wu.png" alt="Bitcoin vs Ethereum" /></a>
                                                            <span class="time-n-date">Western Union</span>
                                                        </div>
                                                    </div>
                                                </article>
                                            </div>
                                            <div class="col-sm-4">
                                                <article class="single-post list-view  no-padding no-margin">
                                                    <div class="blog_custom">
                                                        <!-- POST THUMBNAIL -->
                                                        <div class="col-md-12 post-thumbnail">
                                                            <a class="relative" href="#"><img class="blog_post_image" src="assets/images/servicio/ap.png" alt="The Government versus Bitcoin" /></a>
                                                            <span class="time-n-date">AquiPago</span>
                                                        </div>
                                                    </div>
                                                </article>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        		</div>
        	</div>
        </div>
        
            <!-- HEADER: NAV -->
            <header class="header4" style="position:fixed; width:100%; height: 70px; top:0; overflow: hidden;">
                <!-- BOTTOM BAR -->
                <nav class="navbar navbar-default" style="height: 70px;" id="modeltheme-main-head">
                    <div class="container">
                        <div class="row">
                            <!-- LOGO -->
                            <div class="navbar-header col-sm-12 col-md-3">
                                <h1 class="logo">
                                    <a href="index.php">
                                        <img src="assets/images/logo/logo_menu.png" alt="Cryptic" />
                                    </a>
                                </h1>
                            </div>
                            <!-- NAV MENU -->

                            <!-- NAV MENU -->
                            <div id="navbar" class="navbar-collapse collapse col-sm-12 col-md-9" style="padding: 3px 0px;">
                                <ul class="menu nav navbar-nav pull-left nav-effect nav-menu">
                                    <li class="menu-item menu-item-type-custom menu-item-object-custom"><a href="index.php#operaciones">TABLERO</a></li>
                                    <li class="menu-item menu-item-type-custom menu-item-object-custom"><a href="index.php#giros">GIROS</a></li>
                                    <li class="menu-item menu-item-type-custom menu-item-object-custom"><a href="index.php#nosotros">NOSOTROS</a></li>
                                    <li class="menu-item menu-item-type-custom menu-item-object-custom"><a href="index.php#sucursales">SUCURSALES</a></li>
                                    <li class="menu-item menu-item-type-custom menu-item-object-custom"><a href="index.php#contactos">CONTACTOS</a></li>
                                    <li class="menu-item menu-item-type-custom menu-item-object-custom"><a href="index.php#servicios">OTROS SERVICIOS</a></li>
                                    <li class="menu-item menu-item-type-custom menu-item-object-custom"><a href="index.php#pld">PLD</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </header>

            <!-- FOOTER -->
            <footer id="pld" class="data_background" style="padding-top: 80px;" data-background="assets/images/footer.jpg">
                <!-- FOOTER TOP -->
                <div class="row footer-top">
                    <div class="container">
                        <div class="title-subtile-holder wow fadeIn text_center">
						    <h1 class="section-title light_title">PREVENCIÓN DE LAVADO DE DINERO</h1>
						</div>
                        <div class="row">
                            <div class="col-md-12 footer-row-1">
                                <div class="row">
                                    <div class="col-md-4 sidebar-1">
                                        <aside class="widget vc_column_vc_container widget_nav_menu">
                                            <h1 class="widget-title">&nbsp;</h1>
                                            <div class="menu-footer1-container">
                                                <ul class="menu">
                                                    <li class="menu-item menu-item-type-custom menu-item-object-custom"><a href="assets/pld/ley_1015.pdf" target="_blank">Ley Nº 1015/1997</a></li>
                                                    <li class="menu-item menu-item-type-custom menu-item-object-custom"><a href="assets/pld/ley_2302.pdf" target="_blank">Ley Nº 2302/2002</a></li>
                                                    <li class="menu-item menu-item-type-custom menu-item-object-custom"><a href="assets/pld/ley_2298.pdf" target="_blank">Ley Nº 2298/2003</a></li>
                                                    <li class="menu-item menu-item-type-custom menu-item-object-custom"><a href="assets/pld/ley_2381.pdf" target="_blank">Ley Nº 2381/2004</a></li>
                                                </ul>
                                            </div>
                                        </aside>
                                    </div>
                                    <div class="col-md-4 sidebar-4">
                                        <aside class="widget vc_column_vc_container widget_nav_menu">
                                            <h1 class="widget-title">&nbsp;</h1>
                                            <div class="menu-footer4-container">
                                                <ul class="menu">
                                                    <li class="menu-item menu-item-type-custom menu-item-object-custom"><a href="assets/pld/ley_2378.pdf" target="_blank">Ley Nº 2378/2004</a></li>
                                                    <li class="menu-item menu-item-type-custom menu-item-object-custom"><a href="assets/pld/ley_3440.pdf" target="_blank">Ley Nº 3440/2008</a></li>
                                                    <li class="menu-item menu-item-type-custom menu-item-object-custom"><a href="assets/pld/ley_3783.pdf" target="_blank">Ley Nº 3783/2009</a></li>
                                                    <li class="menu-item menu-item-type-custom menu-item-object-custom"><a href="assets/pld/ley_4042.pdf" target="_blank">Ley Nº 4024/2010</a></li>
                                                </ul>
                                            </div>
                                        </aside>
                                    </div>
                                    <div class="col-md-4 sidebar-4">
                                        <aside class="widget vc_column_vc_container widget_nav_menu">
                                            <h1 class="widget-title">&nbsp;</h1>
                                            <div class="menu-footer4-container">
                                                <ul class="menu">
                                                    <li class="menu-item menu-item-type-custom menu-item-object-custom"><a href="assets/pld/resolucion_349.pdf" target="_blank">Resolución Nº 349/2013</a></li>
                                                    <li class="menu-item menu-item-type-custom menu-item-object-custom"><a href="assets/pld/recomendaciones_gafi_9.pdf" target="_blank">FATF GAFI - Las 9 recomendaciones</a></li>
                                                    <li class="menu-item menu-item-type-custom menu-item-object-custom"><a href="assets/pld/recomendaciones_gafi_40.pdf" target="_blank">FATF GAFI - Las 40 recomendaciones</a></li>
                                                    <li class="menu-item menu-item-type-custom menu-item-object-custom"><a href="assets/pld/recomendaciones_cicad_oea.pdf" target="_blank">CICAD - Reglamentos</a></li>
                                                </ul>
                                            </div>
                                        </aside>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="spacer_80"></div>
                    <div class="container">
                        <div class="title-subtile-holder wow fadeIn text_center">
						    <h1 class="section-title light_title">COMPOSICI&Oacute;N ACCIONARIA</h1>
                            <div class="section-subtitle light_subtitle">CAMBIOS ALBERDI S.A., comunica al sistema financiero nacional, a sus clientes y p&uacute;blico en general que su composici&oacute;n accionaria se encuentra estructurada de la siguiente manera</div>
						</div>
                        <div class="row">
                            <div class="col-md-12 footer-row-1">
                                <div class="row">
                                    <div class="col-md-4 sidebar-1">
                                        <aside class="widget vc_column_vc_container widget_nav_menu">
                                            <h1 class="widget-title">&nbsp;</h1>
                                            <div class="menu-footer1-container">
                                                <ul class="menu">
                                                    <li class="menu-item menu-item-type-custom menu-item-object-custom">Nombre</li>
                                                    <li class="menu-item menu-item-type-custom menu-item-object-custom">Gloria Beatriz Caballero de Zubeldía</li>
                                                    <li class="menu-item menu-item-type-custom menu-item-object-custom">Gloria Beatriz Zubeldía Caballero</li>
                                                </ul>
                                            </div>
                                        </aside>
                                    </div>
                                    <div class="col-md-4 sidebar-4">
                                        <aside class="widget vc_column_vc_container widget_nav_menu">
                                            <h1 class="widget-title">&nbsp;</h1>
                                            <div class="menu-footer4-container">
                                                <ul class="menu">
                                                    <li class="menu-item menu-item-type-custom menu-item-object-custom">Porcentaje de Participación en votos</li>
                                                    <li class="menu-item menu-item-type-custom menu-item-object-custom">65,93%</li>
                                                    <li class="menu-item menu-item-type-custom menu-item-object-custom">34,07%</li>
                                                </ul>
                                            </div>
                                        </aside>
                                    </div>
                                    <div class="col-md-4 sidebar-4">
                                        <aside class="widget vc_column_vc_container widget_nav_menu">
                                            <h1 class="widget-title">&nbsp;</h1>
                                            <div class="menu-footer4-container">
                                                <ul class="menu">
                                                    <li class="menu-item menu-item-type-custom menu-item-object-custom">Pa&iacute;s</li>
                                                    <li class="menu-item menu-item-type-custom menu-item-object-custom">Paraguay</li>
                                                    <li class="menu-item menu-item-type-custom menu-item-object-custom">Paraguay</li>
                                                </ul>
                                            </div>
                                        </aside>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- FOOTER BOTTOM -->
                <div class="footer-div-parent">
                    <div class="container-fluid footer">
                        <div class="col-md-12">
                            <p class="copyright text-center">
                                &copy; 2019 CAMBIOS ALBERDI S.A. | Todos los derechos reservados. Desarrollado por <a href="https://cerouno.com.py/">CEROUNO Labs</a>
                            </p>
                        </div>
                    </div>
                </div>
            </footer>

<?php 
    include ('include/lista_moneda.php');
?>
            <div class="spacer_40"></div>
        </div>

<?php 
    include ('include/footer_script.php');
?>
        <script type="text/javascript">
            function initLoadTablero(valClass) {
                var elems = document.getElementsByClassName(valClass);
                for (i = 0; i < elems.length; i++){
                    elems[i].style.display = 'none';
                }
            }

            function initGiros(valClass) {
                var elems = document.getElementsByClassName('giro-nacional');
                for (i = 0; i < elems.length; i++){
                    elems[i].style.display = 'none';
                }

                document.getElementById('giro00').className = 'live-coin live-coin-v3 text-center';
                document.getElementById('giro01').className = 'live-coin live-coin-v3 text-center';
                document.getElementById('giro02').className = 'live-coin live-coin-v3 text-center';
                document.getElementById('giro03').className = 'live-coin live-coin-v3 text-center';

                document.getElementById('giro0' + valClass).className = 'live-coin live-coin-v3-active text-center';
                document.getElementsByClassName('giro-nacional')[valClass].style.display = 'block';
            }

            function formatNumber(num) {
                return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')
            }

            function rangoPYGGiros(valEnv) {
                var indexArray = 0;

                if (valEnv < 2000001) {
                    indexArray = 1;
                }

                if (valEnv > 2000000 && valEnv < 5000001) {
                    indexArray = 2;
                }

                if (valEnv > 5000000 && valEnv < 10000001) {
                    indexArray = 3;
                }

                if (valEnv > 10000000 && valEnv < 20000001) {
                    indexArray = 4;
                }

                if (valEnv > 20000000 && valEnv < 30000001) {
                    indexArray = 5;
                }

                if (valEnv > 30000000 && valEnv < 40000001) {
                    indexArray = 6;
                }

                if (valEnv > 40000000 && valEnv < 500000001) {
                    indexArray = 7;
                }

                if (valEnv > 50000000 && valEnv < 100000001) {
                    indexArray = 8;
                }

                if (valEnv > 100000000 && valEnv < 150000001) {
                    indexArray = 9;
                }

                if (valEnv > 150000000 && valEnv < 200000001) {
                    indexArray = 10;
                }

                if (valEnv > 200000000 && valEnv < 250000001) {
                    indexArray = 11;
                }

                return indexArray;
            }

            function rangoUSDGiros(valEnv) {
                var indexArray = 0;

                if (valEnv < 1001) {
                    indexArray = 1;
                }

                if (valEnv > 1000 && valEnv < 2001) {
                    indexArray = 2;
                }

                if (valEnv > 2000 && valEnv < 5001) {
                    indexArray = 3;
                }

                if (valEnv > 5000 && valEnv < 10001) {
                    indexArray = 4;
                }

                if (valEnv > 10000 && valEnv < 20001) {
                    indexArray = 5;
                }

                if (valEnv > 20000 && valEnv < 30001) {
                    indexArray = 6;
                }

                if (valEnv > 30000 && valEnv < 40001) {
                    indexArray = 7;
                }

                if (valEnv > 40000 && valEnv < 50001) {
                    indexArray = 8;
                }

                if (valEnv > 50000 && valEnv < 100001) {
                    indexArray = 9;
                }

                if (valEnv > 100000 && valEnv < 200001) {
                    indexArray = 10;
                }

                return indexArray;
            }

            function enviaCIUGiros(valEnv) {
                var indexArray = '';

                switch (valEnv) {
                    case '1':
                        indexArray = 'asuncion';
                        break;

                    case '2':
                        indexArray = 'ciudaddeleste';
                        break;

                    case '3':
                        indexArray = 'encarnacion';
                        break;

                    case '4':
                        indexArray = 'saltodelguaira';
                        break;
                
                    default:
                        indexArray = 'asuncion';
                        break;
                }
                return indexArray;
            }

            function recibeCIUGiros(valEnv, valRec) {
                var indexArray = 0;

                switch (valEnv) {
                    case '1':
                        if (valRec == '2') {
                            indexArray = 'destino_1';
                        }
                        
                        if (valRec == '3') {
                            indexArray = 'destino_2';
                        }

                        if (valRec == '4') {
                            indexArray = 'destino_3';
                        }
                        break;

                    case '2':
                        if (valRec == '1') {
                            indexArray = 'destino_1';
                        }
                        
                        if (valRec == '3') {
                            indexArray = 'destino_2';
                        }

                        if (valRec == '4') {
                            indexArray = 'destino_3';
                        }
                        break;

                    case '3':
                        if (cvalRec == '1') {
                            indexArray = 'destino_1';
                        }
                        
                        if (valRec == '2') {
                            indexArray = 'destino_2';
                        }

                        if (valRec == '4') {
                            indexArray = 'destino_3';
                        }
                        break;

                    case '4':
                        if (valRec == '1') {
                            indexArray = 'destino_1';
                        }
                        
                        if (valRec == '2') {
                            indexArray = 'destino_2';
                        }

                        if (valRec == '3') {
                            indexArray = 'destino_3';
                        }
                        break;
                }
                return indexArray;
            }

            function calcGiros() {
                var ciuEnv  = document.getElementById('ciudad_envia');
                var ciuRec  = document.getElementById('ciudad_recibe');
                var monEnv  = document.getElementById('moneda_envia');
                var impEnv  = document.getElementById('importe_envia');
                var impCos  = document.getElementById('importe_costo');

                var JSONGiro= Object.assign(<?php echo json_encode($JSONGiros); ?>);

                var indEnv  = enviaCIUGiros(ciuEnv.value);
                var indRec  = recibeCIUGiros(ciuEnv.value, ciuRec.value);
                var indMon  = '';

                switch (monEnv.value) {
                    case '1':
                        indEnv  = indEnv + '_usd';
                        indMon  = rangoUSDGiros(impEnv.value);
                        break;
                
                    case '2':
                        indEnv  = indEnv + '_pyg';
                        indMon  = rangoPYGGiros(impEnv.value);
                        break;

                    default:
                        indEnv  = indEnv + '_usd';
                        indMon  = rangoUSDGiros(impEnv.value);
                        break;
                }

                for(let key in JSONGiro) {
                    if (key == indEnv) {
                        var auxTra      = JSONGiro[key][indMon][indRec];
                        var auxRep      = '.';
                        var impTra      = auxTra.replace(auxRep, '');
                        impCos.value    = Number(impTra).toLocaleString('py');
                    }
                }
            }

            function calcOperacion(valOpe) {
                var codCiuOpe   = document.getElementById('ciudad_operacion');
                var codMonTen   = document.getElementById('moneda_tengo');
                var codImpTen   = document.getElementById('importe_tengo');
                var codMonQui   = document.getElementById('moneda_quiero');
                var codImpQui   = document.getElementById('importe_quiero');

                var JSONTablero = Object.assign(<?php echo json_encode($tableroJSON); ?>);

                for(let key in JSONTablero) {
                    if (key == codCiuOpe.value) {
                        var auxJSON = JSONTablero[key];
                        var auxBCP  = '';
                        var auxOPE  = '';

                        if ((codMonTen.value == 'PYG') && (codMonQui.value != 'PYG') && (codMonTen.value != codMonQui.value)) {
                            auxBCP = codMonQui.value;
                            auxOPE = 'venta';
                        }

                        if ((codMonTen.value != 'PYG') && (codMonQui.value == 'PYG') && (codMonTen.value != codMonQui.value)) {
                            auxBCP = codMonTen.value;
                            auxOPE = 'compra';
                        }

                        if ((codMonTen.value != 'PYG') && (codMonQui.value != 'PYG') && (codMonTen.value != codMonQui.value)) {
                            if (codMonTen.value == 'USD' && codMonQui.value != 'EUR') {
                                auxBCP = 'USD -> ' + codMonQui.value;
                                auxOPE = 'compra';
                            }

                            if (codMonQui.value == 'USD' && codMonTen.value != 'EUR') {
                                auxBCP = 'USD -> ' + codMonTen.value;
                                auxOPE = 'venta';
                            }

                            if (codMonTen.value == 'USD' && codMonQui.value == 'EUR') {
                                auxBCP = 'USD -> ' + codMonQui.value;
                                auxOPE = 'venta';
                            }

                            if (codMonQui.value == 'USD' && codMonTen.value == 'EUR') {
                                auxBCP = 'USD -> ' + codMonTen.value;
                                auxOPE = 'compra';
                            }
                        }

                        if (((codMonTen.value == 'PYG') && (codMonQui.value == 'PYG')) || (codMonTen.value == codMonQui.value)) {
                            codImpQui.value = 0;
                            codImpTen.value = 0;
                        }

                        for(let key2 in auxJSON) {
                            var auxOBJ  = auxJSON[key2];
                            var auxInd  = auxOBJ['bcp'];
                            var auxRe1  = '.';
                            var auxRe2  = ',';
                            var impCot  = 0;
                            var impImp  = 0;

                            if ((auxInd == auxBCP) && auxBCP != '' ) {
                                impCot  = auxOBJ[auxOPE];
                                impCot  = impCot.replace(auxRe1, '');
                                impCot  = impCot.replace(auxRe2, '.');
                                
                                if ((auxOPE == 'compra') && (valOpe == 1)){
                                    impImp          = Number(codImpTen.value) * Number(impCot);
                                    codImpQui.value = Number(impImp).toLocaleString('py');
                                }

                                if ((auxOPE == 'compra') && (valOpe == 2)){
                                    impImp          = Number(codImpQui.value) / Number(impCot);
                                    codImpTen.value = Number(impImp).toLocaleString('py');
                                }

                                if ((auxOPE == 'venta') && (valOpe == 1)){
                                    impImp          = Number(codImpTen.value) / Number(impCot);
                                    codImpQui.value = Number(impImp).toLocaleString('py');
                                }

                                if ((auxOPE == 'venta') && (valOpe == 2)){
                                    impImp          = Number(codImpQui.value) * Number(impCot);
                                    codImpTen.value = Number(impImp).toLocaleString('py');
                                }
                            }
                        }
                    }
                }
            }

            function actualizar(){
                location.reload(true);
            }

            setTimeout("actualizar()", 300000);

            setTimeout(function() {
                initLoadTablero("villamorra-ico");
                initLoadTablero("ciudaddeleste-ico");
                initLoadTablero("saltodelguaira-ico");
                initLoadTablero("sanlorenzo-ico");
                initLoadTablero("km4-ico");
                initLoadTablero("encarnacion-ico");
                initGiros(0);
            }, 4000);

            document.addEventListener("visibilitychange", function() {
                console.log( document.visibilityState );
                if (document.visibilityState == 'visible') {
                    actualizar();
                }
            });

            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

            ga('create', 'UA-66561880-3', 'auto');
            ga('send', 'pageview');
        </script>

        <!--Start of Tawk.to Script-->
        <script type="text/javascript">
            var Tawk_API = Tawk_API||{}, Tawk_LoadStart = new Date();
            (function(){
                var s1		= document.createElement("script"), s0 = document.getElementsByTagName("script")[0];
                s1.async	= true;
                s1.src		= 'https://embed.tawk.to/577a02774cc88cf418f5d231/default';
                s1.charset	= 'UTF-8';
                s1.setAttribute('crossorigin', '*');
                s0.parentNode.insertBefore(s1, s0);
            })();
        </script>
        <!--End of Tawk.to Script-->
    </body>
</html>