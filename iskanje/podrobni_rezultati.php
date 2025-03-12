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
                    echo' <li><a href="prijava-odjava/odjava.php" class="btn btn-primary">Objavi oglas</a></li>';
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
 


        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $select = "SELECT * FROM vnesenipodatki WHERE id = $id";
            
            include("../kode_baza/povezava2.php");
                    
                    


            include("../kode_baza/povezava.php");
            $rezultat = mysqli_query($pov, $select);
            if (mysqli_num_rows($rezultat) > 0) {
                while ($row = mysqli_fetch_array($rezultat)) {
                    $proizvajalec = $row["proizvajalec"];
                    $model = $row["model"];
                    $letnik = $row["letnik"];
                    $kilometrina = $row["kilometrina"];
                    $moc = $row["moc"];
                    $gorivo = $row["gorivo"];
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

                    $select2 = "SELECT * FROM registracija WHERE mail = ?";
                    $stmt2 = $pov2->prepare($select2);
                    $stmt2 -> bind_param("s", $mail);
                    $stmt2 -> execute();
                    $rezultat2 = $stmt2 -> get_result();
        
        
                    if ($rezultat2->num_rows > 0) {
                        while ($row2 = $rezultat2->fetch_assoc()) {
                            $ime = $row2["ime"];
                            $priimek = $row2["priimek"];
                            $telefonskaSt = $row2['telefonskaSt'];
                    }

                    


                    $id = $row["id"];
                    // TABELA
                    echo "<table>";
                    
                    echo "<tr>";
                    echo "<td><p>$proizvajalec</p></td>";
                    echo "<td><p>$model</p></td>";
                    echo "<td><p>$cena &euro;</p></td>";
                    echo "</tr>";
                    
                    echo "<tr>";
                    echo "<td><img src='$povSlika1' width='250' height='200'></td>";
                    echo "<td><img src='$povSlika2' width='250' height='200'></td>";
                    echo "<td><img src='$povSlika3' width='250' height='200'></td>";
                    echo "</tr>";
                    
                    echo "<tr>";
                    echo "<td><p>Letnik: $letnik</p></td>";
                    echo "<td><p>Kilometrina: $kilometrina km</p></td>";
                    echo "<td><p>Gorivo: $gorivo</p></td>";
                    echo "</tr>";
                    
                    echo "<tr>";
                    echo "<td><p>Moč: $moc KM</p></td>";
                    echo "<td><p>Menjalnik: $menjalnik</p></td>";
                    echo "</tr>";
                    
                    echo "<tr>";
                    echo "<td colspan=\"3\"><p>Podatki o prodajalcu:</p></td>";
                    echo "</tr>";
                    
                    echo "<tr>";
                    echo "<td><p>Ime in priimek: $ime $priimek</p></td>";
                    echo "<td><p>Telefonska številka: $telefonskaSt</p></td>";
                    echo "<td>E-mail: $mail</td>";
                    echo "</tr>";
                    
                    echo "<tr>";
                    echo "<td colspan=\"3\"><p>Dodatna oprema:</p></td>";
                    echo "</tr>";
                    
                    echo "<tr>";
                    echo "<td><p>Pogon: $pogon</p></td>";
                    echo "</tr>";
                    
                    echo "<tr>";
                    echo "<td><p>ABS: $abs</p></td>";
                    echo "</tr>";
                    
                    echo "<tr>";
                    echo "<td><p>Navigacija: $navigacija</p></td>";
                    echo "</tr>";
                    
                    echo "<tr>";
                    echo "<td><p>Klima: $klima</p></td>";
                    echo "</tr>";
                    
                    echo "<tr>";
                    echo "<td><p>Gretje sedežev: $gretje_sedezev</p></td>";
                    echo "</tr>";
                    
                    echo "</table>";
                    


                }

            }           
        }    
    }
    ?>
    
    <footer>
        <p>&copy; 2024 Jelko d.o.o. Vse pravice pridržane.</p>
    </footer>
</body>
</html>
