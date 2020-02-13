
<?php

require("header.php");
require("db.php");


$disc_id=$_GET["disc_id"];

$artists = $db->query("select * from artist order by artist_name")->fetchAll(PDO::FETCH_OBJ);

$requete = $db->prepare("select * from disc where disc_id=?");
$requete->execute(array($disc_id));
$disc = $requete->fetch(PDO::FETCH_OBJ);

?>


<div class="container">
        <div class="row">
            <div class="col 6"> 
<form action="update_script.php" method="POST" enctype="multipart/form-data">

<h3>Details</h3>
  <div class="form-group">
    <label for="formGroupExampleInput">Titre</label>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Entrez un titre" name="disc_title" value="<?= $disc->disc_title?>" disabled> 
    <!-- disabled , désactive le label , on ne peut pas écrire dedans -->
  </div>

  <div class="form-group">
    <label for="exampleFormControlSelect1">Artiste</label>
    <select class="form-control" id="exampleFormControlSelect1" name="artist_id" disabled>
        <?php foreach ($artists as $artist): ?>
            <option <?= ($artist->artist_id==$disc->artist_id)?"selected":"" ?> value="<?= $artist->artist_id ?>"><?= $artist->artist_name ?></option>
        <?php endforeach; ?>
    </select>
  </div>

<div class="form-group">
    <label for="year">Année</label>
    <input type="number" class="form-control" id="year" aria-describedby="emailHelp" placeholder="" name="disc_year" value="<?= $disc->disc_year?>" readonly>
  </div>

  <div class="form-group">
    <label for="formGroupExampleInput">Genre</label>
    <input type="text" class="form-control" id="genre" placeholder="" name="disc_genre" value="<?= $disc->disc_genre?>" readonly>
        </div>

    <div class="form-group">
    <label for="label">Label</label>
    <input type="text" class="form-control" id="label" aria-describedby="emailHelp" placeholder="" name="disc_label" value="<?= $disc->disc_label?>" readonly>
  </div>

    <div class="form-group">
    <label for="formGroupExampleInput2">Prix</label>
    <input type="text" class="form-control" id="price" placeholder="" name="disc_price" value="<?= $disc->disc_price?>" readonly>
  </div>

  <div class="form-group">
    <label for="formGroupExampleInput2">Image</label>
    <input type="text" class="form-control" id="picture" placeholder="" name="disc_picture" value="<?= $disc->disc_picture?>" readonly>
  </div>

  <a href="update_form.php?disc_id=<?= $disc->disc_id ?>" class="btn btn-primary">Modifier</a>
  <a href="delete_form.php?disc_id=<?= $disc->disc_id ?>" class="btn btn-primary">Supprimer</a>
  <a href="Accueil.php" class="btn btn-primary">Retour</a>

</form>
        

<?php

require("footer.php");

?>