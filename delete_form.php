<?php
    require("header.php");
    require("db.php");

    $disc_id=$_GET["disc_id"];

    $artists = $db->query("select * from artist order by artist_name")->fetchAll(PDO::FETCH_OBJ);
    
    $requete = $db->prepare("select * from disc where disc_id=?");
    $requete->execute(array($disc_id));
    $disc = $requete->fetch(PDO::FETCH_OBJ);
?>

<style>
h1{
  text-align: center;
}


  </style>

<h1>Le formulaire de suppression</h1>

<div class="container">
    <div class="row">
        <div class="col 6">
<h2>Supprimer un vinyle</h2>
<form action="delete_script.php" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="title">Titre</label>
    <input type="text" class="form-control" id="title" aria-describedby="emailHelp" placeholder="" name="disc_title" value="<?= $disc->disc_title?>" disabled>
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
    <input type="number" class="form-control" id="year" aria-describedby="emailHelp" placeholder="" name="disc_year" value="<?= $disc->disc_year?>" disabled>
  </div>

  <div class="form-group">
    <label for="genre">Genre</label>
    <input type="text" class="form-control" id="genre" aria-describedby="emailHelp" placeholder="" name="disc_genre" value="<?= $disc->disc_genre?>" disabled>
  </div>

  <div class="form-group">
    <label for="label">Label</label>
    <input type="text" class="form-control" id="label" aria-describedby="emailHelp" placeholder="" name="disc_label" value="<?= $disc->disc_label?>" disabled>
  </div>

  <div class="form-group">
    <label for="price">Prix</label>
    <input type="text" class="form-control" id="price" aria-describedby="emailHelp" placeholder="" name="disc_price" value="<?= $disc->disc_price?>" disabled>
  </div>


  <button type="submit" class="btn btn-primary">Supprimer</button>
  <a href="details.php?disc_id=<?= $disc->disc_id?>" class="btn btn-primary">Retour</a>

  <input type="hidden" name="disc_id" value="<?= $disc->disc_id?>">
</form>

 </div>
    </div>
        </div>


<?php
    require("footer.php");
?>