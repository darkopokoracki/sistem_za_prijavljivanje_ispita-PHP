<?php require_once '../db.php' ?>


<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $stmt = $pdo->prepare("SELECT * FROM user WHERE username = ?");
        $stmt->execute([$username]);
        $admin = $stmt->fetch();

        if (!$admin) {
            echo 'Admin sa korisnickim imenom koji ste uneli, ne postoji!';
            die();
        }

        if ($admin['password'] != $password) {
            echo 'Pogresna lozinka!';
            die();
        }

        session_start();
        $_SESSION['admin'] = $admin;
        header('Location: admin.php');
    }

?>

<?php include 'modules/head.php' ?>

<div class="container">
    <h2 class="text-center mb-4 mt-4">Admin prijava</h2>

  <form action="login.php" method="post">
    <div class="form-group">
      <label for="username">Ime</label>
      <input type="text" class="form-control" name="username" placeholder="username" id="username">
    </div>

    <div class="form-group">
      <label for="telefon">Telefon</label>
      <input type="password" class="form-control" name="password" placeholder="password" id="password">
    </div>

    <input type="submit" class="btn btn-success" value="Prijavi se">
  </form>
</div>


<? include 'modules/foot.php' ?>