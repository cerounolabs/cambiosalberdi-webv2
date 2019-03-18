<?php
    header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
    header("Expires: Sat, 1 Jul 2000 05:00:00 GMT"); // Fecha en el pasado

    include ('class/curl.php');
    $tabletoJSON = get_curl('getTablero2.json');
?>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="robots" content="noindex,follow" />
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
    </head>