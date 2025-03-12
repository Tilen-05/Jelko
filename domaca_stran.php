<!DOCTYPE html>
<html lang="sl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Jelko - Najnovejši modeli avtomobilov">
    <meta name="keywords" content="Jelko, avtomobili, prodaja avtomobilov">
    <meta name="author" content="Jelko d.o.o.">
    <link rel="stylesheet" href="css_animacije/style1.css">
    <title>Jelko - Domov</title>
</head>
<body>
    <header>
        <a href="domaca_stran.php" class="logo">
            <img src="slike/Jelko-slika.png" alt="Jelko logotip">
        </a>
        <nav>
            <ul>
                <li><a href="domaca_stran.php" class="btn btn-primary">Domov</a></li>
                <?php
                session_start();
                //echo $disabled  ? 'disabled-link' : ''; 
                if ($_SESSION['imeS'] != null && $_SESSION['priimekS'] != null) {
                    echo' <li><a href="vnos/vnos_vozila.php" class="btn btn-primary">Objavi oglas</a></li>';
                }
                else{
                    echo '';
                }
                ?>
                <li><a href="prijava-odjava/prijava.php" class="btn btn-primary">Prijavi se</a></li>
                <?php
                //echo $disabled  ? 'disabled-link' : ''; 
                if ($_SESSION['imeS'] != null && $_SESSION['priimekS'] != null) {
                    echo' <li><a href="prijava-odjava/odjava.php" class="btn btn-primary">Objavi oglas</a></li>';
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
    <!-- DROPDOWN MENI -->
    <?php
        $pov = new mysqli('localhost', 'root', '', 'avtomobili');

        $rezultat = $pov->query("SELECT modeli FROM osnovnimodeli");
    
    ?>
    <!--TABELA-->
    <table>
        <tr>
          <th colspan="4"><p class="center1">OSNOVNO Iskanje avtomobila</p> </th>
        </tr>
        <tr>
          <td>
            <!--ISKANJE ZNAMKE -->
            <form action="iskanje/rezultati_iskanja.php" method="post">
                <select name="iskanjeZnamke">
                    <option value=""> Iskanje znamke </option>
                    <optgroup label="Priljubljene znamke">
                    <option value="BMW"> BMW </option>
                </optgroup>
                <optgroup label="Ostale znamke">
                    <option value="BMW"> BMW </option>
                </optgroup>
                </select>
          </td>
          <td>
            <!--ISKANJE MODELA -->
                <select name="iskanjeModela" id="modelDropdown">
                    <option value=""> Iskanje modela </option>
                    <?php 
                        while ($vrstice = $rezultat->fetch_assoc()) {
                            $model = $vrstice['modeli'];
                            echo "<option value='$model'>$model</option>";
                        }
                    ?> 
                </select> 
          </td>
          <td>
            <!--ISKANJE CENA OD -->
                <select name="iskanjeCeneOd">
                    <option value=""> Cena od </option>
                    <option value="500"> od 500 €</option>
                    <option value="1000"> od 1000 €</option>
                    <option value="2000"> od 2000 €</option>
                    <option value="5000"> od 5000 €</option>
                    <option value="10000"> od 10000 €</option>
                    <option value="20000"> od 20000 €</option>
                    <option value="50000"> od 50000 €</option>
                    <option value="100000"> od 100000 €</option>
                    <option value="150000"> od 150000 €</option>
                    <option value="200000"> od 200000 €</option>
                </select>
            </td>
            <td>
                <!--ISKANJE CENA DO -->
                    <select name="iskanjeCeneDo">
                        <option value=""> Cena do </option>
                        <option value="500"> do 500 €</option>
                        <option value="1000"> do 1000 €</option>
                        <option value="2000"> do 2000 €</option>
                        <option value="5000"> do 5000 €</option>
                        <option value="10000"> do 10000 €</option>
                        <option value="20000"> do 20000 €</option>
                        <option value="50000"> do 50000 €</option>
                        <option value="100000"> do 100000 €</option>
                        <option value="150000"> do 150000 €</option>
                        <option value="200000"> do 200000 €</option>
                    </select>
            </td>
        </tr>
        <tr>
            <td>
                <!--ISKANJE PREVOŽENI KM od -->
                <select name="iskanjeKilometrineOd">
                    <option value=""> km od </option>
                    <option value="5000"> od 5.000 km </option>
                    <option value="10000"> od 10.000 km </option>
                    <option value="25000"> od 25.000 km </option>
                    <option value="50000"> od 50.000 km </option>
                    <option value="100000"> od 100.000 km </option>
                    <option value="150000"> od 150.000 km </option>
                    <option value="200000"> od 200.000 km </option>
                    <option value="250000"> od 250.000 km </option>
                </select>
            </td>
            <td>
                <!--ISKANJE PREVOŽENI KM do-->
                    <select name="iskanjeKilometrineDo">
                        <option value=""> km do </option>
                        <option value="5000"> do 5.000 km </option>
                        <option value="10000"> do 10.000 km </option>
                        <option value="25000"> do 25.000 km </option>
                        <option value="50000"> do 50.000 km </option>
                        <option value="100000"> do 100.000 km </option>
                        <option value="150000"> do 150.000 km </option>
                        <option value="200000"> do 200.000 km </option>
                        <option value="250000"> do 250.000 km </option>
                    </select>
            </td>
            <td>
                <!--ISKANJE LETNIK OD-->
                    <select name="iskanjeLetnikaOd">
                        <option value=""> Letnik od </option>
                        <option value="2000"> od 2000 </option>
                        <option value="2001"> od 2001 </option>
                        <option value="2002"> od 2002 </option>
                        <option value="2003"> od 2003 </option>
                        <option value="2004"> od 2004 </option>
                        <option value="2005"> od 2005 </option>
                        <option value="2006"> od 2006 </option>
                        <option value="2007"> od 2007 </option>
                        <option value="2008"> od 2008 </option>
                        <option value="2009"> od 2009 </option>
                        <option value="2010"> od 2010 </option>
                        <option value="2011"> od 2011 </option>
                        <option value="2012"> od 2012 </option>
                        <option value="2013"> od 2013 </option>
                        <option value="2014"> od 2014 </option>
                        <option value="2015"> od 2015 </option>
                        <option value="2016"> od 2016 </option>
                        <option value="2017"> od 2017 </option>
                        <option value="2018"> od 2018 </option>
                        <option value="2019"> od 2019 </option>
                        <option value="2020"> od 2020 </option>
                        <option value="2021"> od 2021 </option>
                        <option value="2022"> od 2022 </option>
                        <option value="2023"> od 2023 </option>
                        <option value="2024"> od 2024 </option>
                        <option value="2025"> od 2025 </option>
                    </select>
            </td>
            <td>
                <!--ISKANJE LETNIK DO -->
                    <select name="iskanjeLetnikaDo">
                        <option value=""> Letnik do </option>
                        <option value="2000"> do 2000 </option>
                        <option value="2001"> do 2001 </option>
                        <option value="2002"> do 2002 </option>
                        <option value="2003"> do 2003 </option>
                        <option value="2004"> do 2004 </option>
                        <option value="2005"> do 2005 </option>
                        <option value="2006"> do 2006 </option>
                        <option value="2007"> do 2007 </option>
                        <option value="2008"> do 2008 </option>
                        <option value="2009"> do 2009 </option>
                        <option value="2010"> do 2010 </option>
                        <option value="2011"> do 2011 </option>
                        <option value="2012"> do 2012 </option>
                        <option value="2013"> do 2013 </option>
                        <option value="2014"> do 2014 </option>
                        <option value="2015"> do 2015 </option>
                        <option value="2016"> do 2016 </option>
                        <option value="2017"> do 2017 </option>
                        <option value="2018"> do 2018 </option>
                        <option value="2019"> do 2019 </option>
                        <option value="2020"> do 2020 </option>
                        <option value="2021"> do 2021 </option>
                        <option value="2022"> do 2022 </option>
                        <option value="2023"> do 2023 </option>
                        <option value="2024"> do 2024 </option>
                        <option value="2025"> do 2025 </option>
                    </select>
            </td>
        </tr>
        <tr>
            <td>
                <!--ISKANJE GORIVO -->
                    <select name="iskanjeGoriva">
                        <option value=""> Gorivo</option>
                        <option value="bencin"> Bencin</option>
                        <option value="dizel"> Dizel</option>
                        <option value="hibrid"> Hibrid</option>
                        <option value="elektrika"> Elektrika</option>
                        <option value="plin"> Plin</option>
                    </select>
            </td>
            <td colspan="2">
                <button type="submit" name="iskanjeBtn" >Iskanje</button>
            </td>
        </tr>
        </form>
        <form action="iskanje/podrobno_iskanje.php" method="post">
        <tr>
            <td colspan="4">
                <button type="submit" name="podrobnoIskanjeBtn">Podrobno iskanje</button>
            </td>
        </tr>
        </form>
    </table>    
    <footer>
        <p>&copy; 2024 Jelko d.o.o. Vse pravice pridržane</p>
    </footer>
</body>
</html>
