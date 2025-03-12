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
                <li><a href="odjava.php" class="btn btn-primary">Odjavi se</a></li>
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
    <?php
       if(isset($_POST['odjavaBtn'])){
        $_SESSION["imeS"] = null;
        $_SESSION["priimekS"] = null;

       }
    ?>
    <p class="center1">Odjava</p>
    <br>
    <p class="center1">Bi se radi odjavili?</p>
    <!--Prijava -->
    <form  class="center1" action="" method="post">
        <button type="submit" name="odjavaBtn">Odjavi se</button>   
    </form>
    <footer>
        <p>&copy; 2024 Jelko d.o.o. Vse pravice pridržane.</p>
    </footer>
</body>
</html>
