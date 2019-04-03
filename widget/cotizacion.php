<!DOCTYPE html>
<html lang="es-ES">

<?php
    header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
    header("Expires: Sat, 1 Jul 2000 05:00:00 GMT"); // Fecha en el pasado

    include ('../class/curl.php');
    $tableroJSON = get_curl('getTablero2.json');

    $ciudad = $_GET['ciudad'];

    switch ($ciudad) {
        case 'asu':
            $titulo = 'ASUNCIÓN';
            $code   = 'asuncion';
            break;

        case 'vm':
            $titulo = 'VILLA MORRA';
            $code   = 'villamorra';
            break;

        case 'slo':
            $titulo = 'SAN LORENZO';
            $code   = 'sanlorenzo';
            break;

        case 'cde':
            $titulo = 'CIUDAD DEL ESTE';
            $code   = 'ciudaddeleste';
            break;

        case 'sdg':
            $titulo = 'SALTO DEL GUAIRÁ';
            $code   = 'saltodelguaira';
            break;

        case 'km4':
            $titulo = 'CDE KM4';
            $code   = 'km4';
            break;

        case 'enc':
            $titulo = 'ENCARNACIÓN';
            $code   = 'encarnacion';
            break;
        
        default:
            $titulo = 'ASUNCIÓN';
            $code   = 'asuncion';
            break;
    }
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

        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <link rel="shortcut icon" href="../assets/images/logo/favicon.ico">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <style type="text/css">
            .row-border{
                border: 1px solid #e1e1e1;
            }

            .row-border-radius-top{
                overflow: hidden;
                border-top-left-radius: 20px;
                border-top-right-radius: 20px;
            }

            .row-border-radius-bottom{
                overflow: hidden;
                border-bottom-left-radius: 20px;
                border-bottom-right-radius: 20px;
            }

            .themed-grid-hea{
                font-weight: bold;
                background-color: #15A346;
                padding:5px 10px;
            }

            .themed-grid-tit{
                font-weight: bold;
                color: #15A346;
                padding:2.5px 10px;
                font-size: 14px;
            }

            .themed-grid-det{
                padding:2.5px 10px;
                font-size: 14px;
            }

            .grid-head{
                max-width: 200px;
                max-height: 100px;
                margin: auto;
            }

            .grid-img{
                width: 30px;
                height: 30px;
            }

            .text-tit{
                color: #ffffff;
                float: right;
                padding: auto 10px;
            }

            .text-foo, .text-foo:hover{
                color: #ffffff;
            }
        </style>
        
        <title>CAMBIOS ALBERDI S.A. - PY</title>
    </head>
    <body>

        <div class="container">
            <div style="padding:10px;">
                <div class="row row-border-radius-top">
                    <div class="col-12 themed-grid-hea text-left"> <img class="grid-head" src="../assets/images/logo/logo_menu.png" /> </div>
                    <div class="col-12 themed-grid-hea text-left"> <span class="text-tit"> <?php echo $titulo; ?> </span> </div>
                </div>
                <div class="row row-border">
                    <div class="col-6 themed-grid-tit text-left"> MONEDA </div>
                    <div class="col-3 themed-grid-tit text-right"> COMPRA </div>
                    <div class="col-3 themed-grid-tit text-right"> VENTA </div>
                </div>
<?php
    foreach ($tableroJSON[$code] as $tableroKey=>$tableroArray) {
        if (($tableroArray['bcp'] == "USD") || ($tableroArray['bcp'] == "BRL") || ($tableroArray['bcp'] == "EUR") || ($tableroArray['bcp'] == "ARS")) {
?>
                <div class="row row-border">
                    <div class="col-6 themed-grid-det text-left"> <img class="grid-img" src="../assets/images/flag/<?php echo $tableroArray['imaweb']; ?>" /> <?php echo $tableroArray['moneda']; ?> </div>
                    <div class="col-3 themed-grid-det text-right"> <?php echo $tableroArray['compra']; ?> </div>
                    <div class="col-3 themed-grid-det text-right"> <?php echo $tableroArray['venta']; ?> </div>
                </div>
<?php
        }
    }
?>
                <div class="row row-border-radius-bottom">
                    <div class="col-12 themed-grid-hea text-center"> <a href="http://www.cambiosalberdi.com/" class="text-foo" target="_blank"> M&Aacute;S COTIZACIONES <a></div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>