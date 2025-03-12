<?php
    $pov = new mysqli('localhost', 'root', '', 'avtomobili');
    if ($pov->connect_error) {
        die('Povezava ni uspela!'. $pov->connect_error);
    }
    $pov2 = new mysqli('localhost', 'root', '', 'osebnipodatki');
    if ($pov2->connect_error) {
        die('Povezava ni uspela!'. $pov->connect_error);
    }

?>