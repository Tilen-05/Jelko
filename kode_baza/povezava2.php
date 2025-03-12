<?php
    $pov2 = new mysqli('localhost', 'root', '', 'osebnipodatki');
    if ($pov2->connect_error) {
        die('Povezava ni uspela!'. $pov->connect_error);
    }

?>