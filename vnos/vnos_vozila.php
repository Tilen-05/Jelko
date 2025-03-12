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


    <!-- DROP DOWN MENI-->
    <?php
        session_start();
        $pov = new mysqli('localhost', 'root', '', 'avtomobili');
        $rezultat = $pov->query("SELECT modeli FROM osnovnimodeli");

    ?>
<body>
    <header>
        <a href="../domaca_stran.php" class="logo">
            <img src="../slike/Jelko-slika.png" alt="Jelko logotip">
        </a>
        <nav>
            <ul>
                <li><a href="../domaca_stran.php" class="btn btn-primary">Domov</a></li>
                <?php
                if ($_SESSION['imeS'] != null && $_SESSION['priimekS'] != null) {
                    echo' <li><a href="vnos_vozila.php" class="btn btn-primary">Objavi oglas</a></li>';
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

    
    <p class="center1">Vnos vozila</p>
    <form action="../kode_baza/kode.php" method="post" enctype="multipart/form-data">
        <?php
        if ($_SESSION['imeS'] != null && $_SESSION['priimekS'] != null) {
            echo "Dobrodošli " .$_SESSION['imeS']. " " .$_SESSION['priimekS'] ."!";
        }    
        else {
            echo"Niste prijavljeni";
        }
        ?>
        <br>
        <select name="proizvajalec">
            <option value="">Proizvajalec</option>
            <option value="BMW">BMW</option>
        </select>
        <br>
        <select name="model">
            <option value="">Model</option>
            <?php 
                while ($vrstice = $rezultat->fetch_assoc()) {
                    $model = $vrstice['modeli'];
                    echo "<option value='$model'>$model</option>";
                }    
            ?>
        </select>
        <br>
        <input type="number" name="letnik" placeholder="Letnik" required> 
        <br>
        <input type="number" name="kilometrina" placeholder="Kilometrina" required>
        <br>
        <input type="number" name="moc" placeholder="Moč (KM)" required>
        <br>
        <select name="gorivo">
            <option value="">Gorivo</option>
            <option value="bencin">Bencin</option>
            <option value="dizel">Dizel</option>
        </select>
        <br>
        <select name="menjalnik">
            <option value="">Menjalnik</option>
            <option value="rocni">Ročni</option>
            <option value="avtomatski">Avtomatski</option>
        </select>
        <br>
        <select name="pogon">
            <option value="">Pogon</option>
            <option value="FWD">Pogon na sprednja kolesa</option>
            <option value="RWD">Pogon na zadnja kolesa</option>
            <option value="AWD">Pogon na vsa kolesa</option>
        </select>
        <br>
        <select name="abs">
            <option value="">ABS</option>
            <option value="da">DA</option>
            <option value="ne">NE</option>
        </select>
        <br>
        <select name="navigacija">
            <option value="">Navigacija</option>
            <option value="da">DA</option>
            <option value="ne">NE</option>
        </select>
        <br>
        <select name="klima">
            <option value="">Klima</option>
            <option value="da">DA</option>
            <option value="ne">NE</option>
        </select>
        <br>
        <select name="gretje_sedezev">
            <option value="">Gretje sedežev</option>
            <option value="da">DA</option>
            <option value="ne">NE</option>
        </select>
        <br>
        <input type="number" name="cena" placeholder="Cena" required>
        <br>
        <input type="file" name="slika1" required>
        <br>
        <input type="file" name="slika2" required>
        <br>
        <input type="file" name="slika3" required>
        <br>
        <button type="submit" name="oddajaBtn">Oddaj oglas</button>
    </form>
    <footer>
        <p>&copy; 2024 Jelko d.o.o. Vse pravice pridržane.</p>
    </footer>
</body>
</html>