<?php
    if(isset($_POST['registracijaBtn'])){
        $ime = $_POST['ime'];
        $priimek = $_POST['priimek'];
        $telefonskaSt = $_POST['telefonskaSt'];
        $mail = $_POST['mail'];
        $geslo = $_POST['geslo'];

        //povezava z bazo
        $pov = new mysqli('localhost', 'root', '', 'osebnipodatki');
        if($pov->connect_error){
            die('Povezava ni uspela  :'.$pov->connect_error);
        }
        $mail_select = "SELECT * FROM registracija WHERE mail = '$mail'";
        $mail_zazeni = mysqli_query($pov, $mail_select);
        if (mysqli_num_rows($mail_zazeni) > 0) {
            echo "Mail je že v uporabi";
        }
        else{
            $stmt = $pov->prepare("insert into registracija(ime, priimek, telefonskaSt, mail, geslo) values(?, ? , ?, ?, ?)");
            $stmt->bind_param("ssiss", $ime, $priimek, $telefonskaSt, $mail, $geslo);
            $stmt->execute();
            echo "Uspešna registracija";
            $stmt->close();
            $pov->close();
    }

    

    }
?>