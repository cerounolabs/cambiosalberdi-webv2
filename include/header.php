<?php
    header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
    header("Expires: Sat, 1 Jul 2000 05:00:00 GMT"); // Fecha en el pasado

    include ('class/curl.php');
    $tableroJSON = get_curl('getTablero2.json');
?>
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