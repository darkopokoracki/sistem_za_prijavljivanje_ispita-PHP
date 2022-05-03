<?php require_once 'auth.php' ?>
<?php require_once '../db.php' ?>

<?php
    $stmt = $pdo->query("SELECT prijava.id, prijava.ime, prijava.telefon, smer.naziv FROM prijava
                         INNER JOIN smer ON prijava.smer_id = smer.id
                         WHERE prijava.potvrdjeno = 0");
    $prijave = $stmt->fetchAll();
?>

<?php include 'modules/head.php' ?>

<div class="container">
  <div class="jumbotron">
    <h1>Dobrodosli na <span class="text-danger">admin</span> panel</h1>
    <a href="logout.php" class="btn btn-warning">Odjavi se</a>
  </div>

  <div class="jumbotron">
    <h2 class="mb-4 mt-4">Nepotvrdjene prijave</h2>

    <?php if (empty($prijave)) { ?>
      <div class="alert alert-danger">
        Nemate ni jednu prijavu na cekanju!
      </div>
    <?php } else { ?>

    <table class="table table-striped table-hover table-dark">
      <thead>
        <tr>
          <th>Student</th>
          <th>Telefon</th>
          <th>Smer</th>
          <th>Opcije</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($prijave as $prijava) { ?>
          <tr>
            <td>  <?= $prijava['ime'] ?>  </td>
            <td>  <?= $prijava['telefon'] ?>  </td>
            <td>  <?= $prijava['naziv'] ?>  </td>
            <td>
              <a href="potvrdi.php?id=<?= $prijava['id'] ?>" class="btn btn-success">
                Potvrdi
              </a>
              <a href="obrisi.php?id=<?= $prijava['id'] ?>" class="btn btn-danger">
                Obrisi
              </a>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
    <?php } ?>
  </div>

</div>


<?php include 'modules/foot.php' ?>