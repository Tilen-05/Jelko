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
        <a href="domaca_stran.html" class="logo">
            <img src="../slike/Jelko-slika.png" alt="Jelko logotip">
        </a>
        <nav>
            <ul>
                <li><a href="../domaca_stran.php" class="btn btn-primary">Domov</a></li>
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
                <li><a href="prijava.php" class="btn btn-primary">Prijavi se</a></li>
                <?php
                //echo $disabled  ? 'disabled-link' : ''; 
                if ($_SESSION['imeS'] != null && $_SESSION['priimekS'] != null) {
                    echo' <li><a href="odjava.php" class="btn btn-primary">Objavi oglas</a></li>';
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

    <p class="center1">Registracija</p>
    <!--REGISTRACIJA -->
    <form action="../povezave_na_bazo/osebni_podatki.php" method="post">
        Ime: <input type="text" name="ime"> <br>
        Priimek: <input type="text" name="priimek"> <br>
        Telefonska številka <input type="number" name="telefonskaSt"><br>
        E-mail: <input type="text" name="mail"> <br>
        Geslo: <input type="password" name="geslo"> <br>
        <button type="submit" name="registracijaBtn">Prijavi se</button>  
    </form>
    <footer>
        <p>&copy; 2024 Jelko d.o.o. Vse pravice pridržane.</p>
    </footer>
</body>
</html>
