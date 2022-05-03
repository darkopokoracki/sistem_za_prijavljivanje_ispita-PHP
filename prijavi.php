<?php require_once 'db.php' ?>

<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        if (strlen($_POST['ime']) <= 3) {
            echo 'Greska! Ime mora da bude duze od 3 slova!';
            die();
        }

        if (!is_numeric($_POST['smer'])) {
            echo 'Greska! Smer Id mora da bude broj!';
            die();
        }

        $smer_id = $_POST['smer'];
        $ime = $_POST['ime'];
        $telefon = $_POST['telefon'];

        $stmt = $pdo->prepare("INSERT INTO prijava(smer_id, ime, telefon) VALUES(?, ?, ?)");
        $stmt ->execute([$smer_id, $ime, $telefon]);

        header('Location: index.php');
        die();
    }
?>