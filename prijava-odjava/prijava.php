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
    <?php
        session_start();
        if(isset($_POST['prijavaBtn'])){
            $mailP = $_POST['mailP'];
            $gesloP = $_POST['gesloP'];

            $pov = new mysqli('localhost', 'root', '', 'osebnipodatki');
            if($pov->connect_error){
                die('Povezava ni uspela  :'.$pov->connect_error);
            }

            $mail_selectP = "SELECT * FROM registracija";
            $mail_zazeniP = mysqli_query($pov, $mail_selectP);

            $st = 0;
            if (mysqli_num_rows($mail_zazeniP) > 0) {
                while ($row = mysqli_fetch_array(  $mail_zazeniP)) {
                    if ($row['mail'] == $mailP && $row['geslo'] == $gesloP) {
                        echo"Vpisani ste!";
                        $st += 1;
                        //header("Location: ../domaca_stran.php");
                        $_SESSION["imeS"] = $row['ime'];
                        $_SESSION["priimekS"] = $row['priimek'];
                        $_SESSION['mailS'] = $row['mail'];
                        echo$_SESSION["imeS"];
                        break;
                    }
                    else {
                        $_SESSION["priimekS"] = null;
                        $_SESSION["priimekS"] = null;
                        $_SESSION['mailS'] = null;
                        continue;
                    }
                }
            }
            $_SESSION['st'] = $st;
        }
        
        
    ?>
    <header>
        <a href="domaca_stran.html" class="logo">
            <img src="../slike/Jelko-slika.png" alt="Jelko logotip">
        </a>
        <nav>
            <ul>
                <li><a href="../domaca_stran.php" class="btn btn-primary">Domov</a></li>
                <?php

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
   
    <p class="center1">Prijava</p>
    <?php
        if (isset($_SESSION['st']) && $_SESSION['st'] < 1)  {
            echo "Niste registrirani!";
        }
    
    ?>
    <!--Prijava -->
    <form action="" method="post">
        E-mail: <input type="text" name="mailP" required> <br>
        Geslo: <input type="password" name="gesloP" required> <br>
        <button type="submit" name="prijavaBtn">Prijavi se</button>
    </form>
    <form action="registracija.php">
        <button type="submit" name="registracijaBtn" href="registracija.php">Registriraj se</button>   
    </form>
    <footer>
        <p>&copy; 2024 Jelko d.o.o. Vse pravice pridržane.</p>
    </footer>
</body>
</html>
