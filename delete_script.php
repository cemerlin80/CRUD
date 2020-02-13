<?php
    require("db.php");

    $disc_id = htmlspecialchars($_POST["disc_id"]);

    
    
    $requete = $db->prepare("delete from disc where disc_id=?");

    $requete->execute(array($disc_id));


    header("Location: Accueil.php");