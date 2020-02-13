<?php
    require("header.php");
    require("db.php");

    $disc_id=$_GET["disc_id"];

    $artists = $db->query("select * from artist order by artist_name")->fetchAll(PDO::FETCH_OBJ); // Retourne un tableau contenant toutes les lignes, ici on récupère tout les noms d'artiste
    
    $requete = $db->prepare("select * from disc where disc_id=?"); // Prépare la requête
    $requete->execute(array($disc_id)); // Execute la requête du tableau
    $disc = $requete->fetch(PDO::FETCH_OBJ); // Parcours le tableau ligne par ligne
?>

<style>
h1{
  text-align: center;
}


  </style>

<h1>Le formulaire de modification</h1>

<div class="container">
    <div class="row">
        <div class="col 6">
<h2>Modifier un vinyle</h2>
<form action="update_script.php" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="title">Titre</label>
    <input type="text" class="form-control" id="title" aria-describedby="emailHelp" placeholder="" name="disc_title" value="<?= $disc->disc_title?>">
  </div>
 
  <div class="form-group">
    <label for="exampleFormControlSelect1">Artiste</label>
    <select class="form-control" id="exampleFormControlSelect1" name="artist_id">
        <?php foreach ($artists as $artist): ?>
            <option <?= ($artist->artist_id==$disc->artist_id)?"selected":"" ?> value="<?= $artist->artist_id ?>"><?= $artist->artist_name ?></option>
        <?php endforeach; ?>
    </select>
  </div>

  <div class="form-group">
    <label for="year">Année</label>
    <input type="number" class="form-control" id="year" aria-describedby="emailHelp" placeholder="" name="disc_year" value="<?= $disc->disc_year?>">
  </div>

  <div class="form-group">
    <label for="genre">Genre</label>
    <input type="text" class="form-control" id="genre" aria-describedby="emailHelp" placeholder="" name="disc_genre" value="<?= $disc->disc_genre?>">
  </div>

  <div class="form-group">
    <label for="label">Label</label>
    <input type="text" class="form-control" id="label" aria-describedby="emailHelp" placeholder="" name="disc_label" value="<?= $disc->disc_label?>">
  </div>

  <div class="form-group">
    <label for="price">Prix</label>
    <input type="text" class="form-control" id="price" aria-describedby="emailHelp" placeholder="" name="disc_price" value="<?= $disc->disc_price?>">
  </div>


  <div class="form-group">
    <label for="exampleFormControlFile1">Example file input</label>
    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="disc_picture">
  </div>

  <button type="submit" class="btn btn-primary">Modifier</button>
  <a href="Accueil.php" class="btn btn-primary">Retour</a>

  <input type="hidden" name="disc_id" value="<?= $disc->disc_id?>"> <!-- Cacher l'id -->
</form>

 </div>
    </div>
        </div>


<?php
    require("footer.php");
?>