<?php

require("header.php");   // On appelle toujours le header et la page BDD
require("db.php");


$artists = $db->query("select * from artist order by artist_name")->fetchAll(PDO::FETCH_OBJ); // fetchALL , permet d'afficher toutes les données
   // Utilisation de query , pour appeller la BDD
?>
<style>
.btn{
    margin-top: 10px ;
}
h1{
    text-align: center;
}

</style>

<h1>Formulaire d'ajout</h1>


<div class="container">
        <div class="row">
            <div class="col-10">
            <form action="add_script.php" method="POST" enctype="multipart/form-data">
    
<h3>Ajouter un vinyle</h3>
  <div class="form-group">
    <label for="formGroupExampleInput">Titre</label>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Entrez un titre" name="disc_title">
  </div>
  
  <div class="form-group">
    <label for="exampleFormControlSelect1">Choisir</label>
    <select class="form-control" id="exampleFormControlSelect1" name="artist_id">
        <?php foreach ($artists as $artist): ?>
            <option value="<?= $artist->artist_id ?>"><?= $artist->artist_name ?></option>  <!-- On utilise foreach pour sélectionner un artiste avec le sélecteur -->
        <?php endforeach; ?>  <!-- endforeach met fin à la boucle -->
    </select>
  </div>

  <div class="form-group">
    <label for="formGroupExampleInput2">Année</label>
    <input type="number" class="form-control" id="formGroupExampleInput2" placeholder="Entrez l'année" name="disc_year">
  </div>

  <div class="form-group">
    <label for="formGroupExampleInput2">Genre</label>
    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Entrez un genre(Rock, Pop, Prog..)" name="disc_genre">
  </div>

  <div class="form-group">
    <label for="formGroupExampleInput">Label</label>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Entrez label (EMI, Warner, PolyGram, Univers Sale..)" name="disc_label">

    

    <div class="form-group">
    <label for="formGroupExampleInput2">Prix</label>
    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="" name="disc_price">
  </div>

  <div class="form-group">
    <label for="exampleFormControlFile1"></label>
    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="disc_picture">
  </div>
  


</form>
<div>
<button type="submit" class="btn btn-primary">Ajouter</button>
<a href="Accueil.php" class="btn btn-primary">Retour</a>   <!-- Un bouton submit pour valider , et un href pour rediriger vers la page accueil -->

  
</div>

<?php

require("footer.php");

?>

