<?php require_once 'db.php' ?>

<?php
    // Potvrdjene prijave
    $stmt = $pdo->query("SELECT prijava.ime, prijava.telefon, smer.naziv FROM prijava
                           INNER JOIN smer ON prijava.smer_id = smer.id
                           WHERE prijava.potvrdjeno = 1");
    $prijave = $stmt->fetchAll();


    // Smerovi
    $stmt = $pdo->query("SELECT * FROM smer");
    $smerovi = $stmt->fetchAll();
?>

<?php include 'modules/head.php' ?>

<div class="container">
  <div class="jumbotron">
    <h2 class="bm-4 mt-4">Spisak potvrdjenih prijava</h2>
    <br>
    <?php if (empty($prijave)) { ?>
      <div class="alert alert-danger">
        Trenutno nema potvrdjenih prijava!
      </div>
    <?php } else { ?>
    <table class="table table-striped table-hover table-dark">
      <thead>
        <tr>
          <th>Ime</th>
          <th>Telefon</th>
          <th>Smer</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($prijave as $prijava) { ?>
          <tr>
            <td>  <?= $prijava['ime'] ?>  </td>
            <td>  <?= $prijava['telefon'] ?>  </td>
            <td>  <?= $prijava['naziv'] ?>  </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
    <?php } ?>
  </div>

  
  <br><br>
  <div class="jumbotron">
    <h2 class="mb-4 mt-4">Prijava prijemnog ispita</h2>
    <form action="prijavi.php" method="post">
      <div class="form-group">
        <label for="ime">Ime</label>
        <input type="text" class="form-control" name="ime" placeholder="unesite ime..." id="ime">
      </div>
  
      <div class="form-group">
        <label for="telefon">Telefon</label>
        <input type="tel" class="form-control" name="telefon" placeholder="Unesite telefon..." id="telefon">
      </div>
  
      <div class="form-group">
        <label for="smer">Smer</label>
        <select name="smer" id="smer">
          <?php foreach ($smerovi as $smer) { ?>
            <option value="<?= $smer['id'] ?>">  <?= $smer['naziv'] ?>  </option>
          <?php } ?>
        </select>
      </div>
  
      <input type="submit" class="btn btn-success" value="Prijavi ispit">
    </form>
  </div>

</div>

<?php include 'modules/foot.php' ?>