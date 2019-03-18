            <!-- TICKERS DARK -->
            <div class="tickers-black-sm crypto-ticker">
                <ul id="webticker-dark-icons">
<?php
    $item = 0;
    foreach ($tabletoJSON['asuncion'] as $tabAsuKey=>$tabAsuArray) {
        if ($tabAsuArray['bcp'] != "") {

?>
                    <li data-update="item<?php echo $item; ?>"> <img class="footer-tablero-image" src="assets/images/flag/<?php echo $tabAsuArray['imaweb']; ?>" /> <?php echo $tabAsuArray['bcp']; ?> <span class="footer-tablero-moneda-compra"> COMPRA </span> <?php echo $tabAsuArray['compra']; ?> - <span class="footer-tablero-moneda-venta"> VENTA </span> <?php echo $tabAsuArray['venta']; ?></li> 
<?php
            $item = $item + 1;            
        }
    }

?>
                </ul>
            </div>
