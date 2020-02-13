<?php
require("header.php");
require("db.php");



$discs = $db->query("select * from disc join artist using(artist_id) order by artist_name")->fetchAll(PDO::FETCH_OBJ); // On appelle la BDD sur la table $disc , on utilise la requete select .
?>
<style>
h1{
  text-align: center;
}
img{
  width: 150px;
}

td{
  border: solid black;
}

button{
  float: left;
}


</style>


<div>
  <h1>Listes</h1>
<div class="container">
<a href="add_form.php" class="btn btn-primary">Ajouter</a>   <!-- Lien vers la page Ajouter -->
<table class="table table-sm">
  <?php foreach ($discs as $disc) : ?>  <!-- On utilise un foreach pour parcourir un tableau , on cherche les informations de la table $disc pour les afficher-->
    <tr>
      <td>
        <img src="images/<?= $disc->disc_picture ?>">  <!-- Afficher les images de la BDD -->
      </td>
      <td>
      <div>
          <?= $disc->artist_name ?>    <!-- On affiche les données de chaque colonne de la BDD dans un tableau HTML -->
        </div>
        <div>
          <?= $disc->disc_title ?>
        </div>
        <div>
          <?= $disc->disc_label ?>
        </div>
        <div>
          <?= $disc->disc_year ?>
        </div>
        <div>
          <?= $disc->disc_genre ?>
        </div>
        
        <a href="details.php?disc_id=<?= $disc->disc_id?>" class="btn btn-primary">details</a>  <!-- Lien vers la page détails -->
      </td>
    </tr>
  <?php endforeach; ?>
</table>
  </div>
  </div>


<?php
require("footer.php");  

?>