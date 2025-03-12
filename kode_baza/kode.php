<?php
    session_start();
    include_once("povezava.php");
    $mailV =  $_SESSION['mailS'];


        if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['oddajaBtn'])) {

            if(empty($_POST['proizvajalec']) || empty($_POST['model']) || empty($_POST['letnik']) || 
            empty($_POST['kilometrina']) || empty($_POST['moc']) || empty($_POST['gorivo']) || 
            empty($_POST['menjalnik']) || empty($_POST['pogon']) || empty($_POST['abs']) || 
            empty($_POST['navigacija']) || empty($_POST['klima']) || empty($_POST['gretje_sedezev']) || 
            empty($_POST['cena'])) {
                die('Napaka: Vsa polja morajo biti izpolnjena!');
            }

            //if (!isset($_FILES['slika1']) || $_FILES['slika1']['error'] !== UPLOAD_ERR_OK) {
            //    die("Napaka: Datoteka slika1 ni bila pravilno naložena.");
            //}

            $proizvajalec = $_POST['proizvajalec'];
            $model = $_POST['model'];
            $letnik = $_POST['letnik'];
            $kilometrina = $_POST['kilometrina'];
            $moc = $_POST['moc'];
            $gorivo = $_POST['gorivo'];
            $menjalnik = $_POST['menjalnik'];
            $pogon = $_POST['pogon'];
            $abs = $_POST['abs'];
            $navigacija = $_POST['navigacija'];
            $klima = $_POST['klima'];
            $gretje_sedezev = $_POST['gretje_sedezev'];
            $cena = $_POST['cena'];
            

            $dovoljeniTipi = array('jpg', 'jpeg', 'png', 'gif');

            function shraniSliko($imePolja, $dovoljeniTipi) {
                if (isset($_FILES[$imePolja]) && $_FILES[$imePolja]['error'] === UPLOAD_ERR_OK) {
                    $ext = strtolower(pathinfo($_FILES[$imePolja]['name'], PATHINFO_EXTENSION));
                    
                    if (in_array($ext, $dovoljeniTipi)) {
                        $novaLokacija = "../vnesene_slike/" . uniqid() . ".$ext";
                        if (move_uploaded_file($_FILES[$imePolja]['tmp_name'], $novaLokacija)) {
                            return $novaLokacija;
                        }
                    }
                }
                return null;
            }

            $slika1 = shraniSliko('slika1', $dovoljeniTipi);
            $slika2 = shraniSliko('slika2', $dovoljeniTipi);
            $slika3 = shraniSliko('slika3', $dovoljeniTipi);

            if ($slika1) {
                //$conn = new mysqli('localhost', 'root', '', 'avtomobili');

                $stmt = $pov->prepare("INSERT INTO vnesenipodatki 
                    (proizvajalec, model, letnik, kilometrina, moc, gorivo, menjalnik, pogon, abs, navigacija, klima, gretje_sedezev, cena, slika1, slika2, slika3, mail) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

                $stmt->bind_param("ssiiisssssssissss", $proizvajalec, $model, $letnik, $kilometrina, $moc, $gorivo, $menjalnik, $pogon, $abs, $navigacija, $klima, $gretje_sedezev, $cena, $slika1, $slika2, $slika3, $mailV);

                if ($stmt->execute()) {
                    echo "Oglas je bil oddan!";
                } else {
                    echo "Napaka pri vnosu: " . $stmt->error;
                }

                $stmt->close();
                $pov->close();
            } else {
                echo "Napaka pri shranjevanju slike.";
            }
        }

	?>