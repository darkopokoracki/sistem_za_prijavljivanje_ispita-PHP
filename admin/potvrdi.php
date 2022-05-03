<?php require_once 'auth.php' ?>
<?php require_once '../db.php' ?>

<?php
    $id = $_GET['id'];

    $stmt = $pdo->prepare("UPDATE prijava SET potvrdjeno = 1 WHERE id = ?");
    $stmt->execute([$id]);
    
    header('Location: admin.php');
    die();
?>