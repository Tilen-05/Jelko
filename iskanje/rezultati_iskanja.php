<!DOCTYPE html>
<html lang="sl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Jelko - Najnovejši modeli avtomobilov">
    <meta name="keywords" content="Jelko, avtomobili, prodaja avtomobilov">
    <meta name="author" content="Jelko d.o.o.">
    <link rel="stylesheet" href="../css_animacije/style1.css">
    <title>Jelko - Domov</title>
</head>
<body>
    <header>
        <a href="../domaca_stran.php" class="logo">
            <img src="../slike/Jelko-slika.png" alt="Jelko logotip">
        </a>
        <nav>
            <ul>
                <li><a href="../domaca_stran.php" class="btn btn-primary">Domov</a></li>
                <?php
                session_start();
                //echo $disabled  ? 'disabled-link' : ''; 
                if ($_SESSION['imeS'] != null && $_SESSION['priimekS'] != null) {
                    echo' <li><a href="../vnos/vnos_vozila.php" class="btn btn-primary">Objavi oglas</a></li>';
                }
                else{
                    echo '';
                }
                ?>
                <li><a href="../prijava-odjava/prijava.php" class="btn btn-primary">Prijavi se</a></li>
                <?php
                //echo $disabled  ? 'disabled-link' : ''; 
                if ($_SESSION['imeS'] != null && $_SESSION['priimekS'] != null) {
                    echo' <li><a href="../prijava-odjava/odjava.php" class="btn btn-primary">Objavi oglas</a></li>';
                }
                else{
                    echo '';
                }
                ?>
                <li><a href="" class="btn btn-primary">
                <?php
                    if ($_SESSION['imeS'] != null && $_SESSION['priimekS'] != null) {
                        echo $_SESSION['imeS']. " " .$_SESSION['priimekS'];
                    }    
                    else {
                        echo"Niste prijavljeni";
                    }
                
                ?></a></li>
            </ul>
        </nav>

    </header>
    <p class="center1">Rezultati iskanja</p>
    <?php
         if(isset($_POST['iskanjeBtn'])){
            //OSNOVNO ISKANJE
            $iskanjeZnamke = isset($_POST['iskanjeZnamke']) ? $_POST['iskanjeZnamke'] : '';
            $iskanjeModel = isset($_POST['iskanjeModela']) ? $_POST['iskanjeModela'] : '';
            $iskanjeCeneOd = isset($_POST['iskanjeCeneOd']) ? $_POST['iskanjeCeneOd'] : '';
            $iskanjeCeneDo = isset($_POST['iskanjeCeneDo']) ? $_POST['iskanjeCeneDo'] : '';
            $iskanjeKilometrineOd = isset($_POST['iskanjeKilometrineOd']) ? $_POST['iskanjeKilometrineOd'] : '';
            $iskanjeKilometrineDo = isset($_POST['iskanjeKilometrineDo']) ? $_POST['iskanjeKilometrineDo'] : '';
            $iskanjeLetnikaOd = isset($_POST['iskanjeLetnikaOd']) ? $_POST['iskanjeLetnikaOd'] : '';
            $iskanjeLetnikaDo = isset($_POST['iskanjeLetnikaDo']) ? $_POST['iskanjeLetnikaDo'] : '';
            $iskanjeGoriva = isset($_POST['iskanjeGoriva']) ? $_POST['iskanjeGoriva'] : '';
            // $iskanjeMoci = isset($_POST['iskanjeMoci']) ? $_POST['iskanjeMoci'] : '';


            

            include("../kode_baza/povezava.php");
        $select = "SELECT * FROM vnesenipodatki";
        $rezultat = mysqli_query($pov, $select);
        if (mysqli_num_rows($rezultat) > 0) {
            while ($row = mysqli_fetch_array($rezultat)) {
                $proizvajalec = $row["proizvajalec"];
                if ($proizvajalec != $iskanjeZnamke && $iskanjeZnamke != null) {
                    continue;
                }
                $model = $row["model"];
                if ($model != $iskanjeModel && $iskanjeModel != null) {
                    continue;
                }
                $letnik = $row["letnik"];
                if ($letnik < $iskanjeLetnikaOd && $iskanjeLetnikaOd != null) {
                    continue;
                }
                if ($letnik > $iskanjeLetnikaDo && $iskanjeLetnikaDo != null) {
                    continue;
                }
                
                $kilometrina = $row["kilometrina"];
                if ($kilometrina < $iskanjeKilometrineOd && $iskanjeKilometrineOd != null) {
                    continue;
                }
                if ($kilometrina > $iskanjeKilometrineDo && $iskanjeKilometrineDo != null) {
                    continue;
                }
                
                $moc = $row["moc"];
            

                $gorivo = $row["gorivo"];
                if ($gorivo != $iskanjeGoriva && $iskanjeGoriva != null) {
                    continue;
                }
                
                

                $menjalnik = $row["menjalnik"];
                $pogon = $row["pogon"];
                $abs = $row["abs"];
                $navigacija = $row["navigacija"];
                $klima = $row["klima"];
                $gretje_sedezev = $row["gretje_sedezev"];
                $cena = $row["cena"];
                $slika1 = $row["slika1"];
                $slika2 = $row["slika2"];
                $slika3 = $row["slika3"];
                $povSlika1 = "../vneseneslike/".$slika1;
                $povSlika2 = "../vneseneslike/".$slika2;
                $povSlika3 = "../vneseneslike/".$slika3;
                $mail = $row["mail"];

                

                $id = $row["id"];
                // TABELA
                echo "<table onclick=\"window.location.href='podrobni_rezultati.php?id=$id';\" style=\"cursor: pointer;\">";
                echo "    <tr>";
                echo "        <td colspan='3'>";
                echo "            <div>$proizvajalec $model</div>";
                echo "        </td>";
                echo "    </tr>";
                echo "    <tr>";
                echo "        <td>";
                echo "            <img src='$povSlika1' width='250' height='200'>";
                echo "        </td>";
                echo "        <td>";
                echo "            <img src='$povSlika2' width='250' height='200'>";
                echo "        </td>";
                echo "        <td>";
                echo "            <img src='$povSlika3' width='250' height='200'>";
                echo "        </td>";
                echo "    </tr>";
                echo "    <tr>";
                echo "        <td colspan='3'>";
                echo "            <p>Letni: $letnik</p>";
                echo "        </td>";
                echo "    </tr>";
                echo "    <tr>";
                echo "        <td colspan='3'>";
                echo "            <p>Kilometrina: $kilometrina km</p>";
                echo "        </td>";
                echo "    </tr>";
                echo "    <tr>";
                echo "        <td colspan='3'>";
                echo "            <p>Moč: $moc KM</p>";
                echo "        </td>";
                echo "    </tr>";
                echo "    <tr>";
                echo "        <td colspan='3'>";
                echo "            <p>Gorivo: $gorivo</p>";
                echo "        </td>";
                echo "    </tr>";
                echo "    <tr>";
                echo "        <td colspan=\"3\">";
                echo "            <p>Menjalnik: $menjalnik</p>";
                echo "        </td>";
                echo "    </tr>";
                echo "    <tr>";
                echo "        <td colspan='3'>";
                echo "        <p>Cena: $cena &euro</p>";
                echo "        </td>";
                echo "    </tr>";
                echo "    <tr>";
                echo "         <td colspan='3'>";
                echo "         <p>E-mail: $mail</p>";
                echo "         <td>";
                echo "    </tr>";        
                echo "</table>";
            }

        }           
        }    
    ?>
    
    <footer>
        <p>&copy; 2024 Jelko d.o.o. Vse pravice pridržane.</p>
    </footer>
</body>
</html>
