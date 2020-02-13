<?php

require("db.php");
    // htmlspecialchars = caractères spéciaux qui changent les balises en caractères spéciaux pour sécuriser les données.
    $disc_title = htmlspecialchars($_POST["disc_title"]); 
    $artist_id = htmlspecialchars($_POST["artist_id"]);
    $disc_year = htmlspecialchars($_POST["disc_year"]);
    $disc_genre = htmlspecialchars($_POST["disc_genre"]);
    $disc_label = htmlspecialchars($_POST["disc_label"]);
    $disc_price = htmlspecialchars($_POST["disc_price"]);

   
    $mime = mime_content_type($_FILES["disc_picture"]["tmp_name"]);  // $mime , Détecte le type de contenu d'un fichier
    
    $tab = explode("/", $mime); // Découpe un tableau
    $disc_picture = $disc_title . "." . $tab[1];
    
    move_uploaded_file($_FILES["disc_picture"]["tmp_name"], "images/" . $disc_picture); // Permet de séléctionner un fichier images dans un dossier

    $requete = $db->prepare("insert into disc (disc_title, disc_year, artist_id, disc_genre, disc_label, disc_price, disc_picture) values (?, ?, ?, ?, ?, ?, ?)"); // Prépare les requêtes

    $requete->execute(array($disc_title, $disc_year, $artist_id, $disc_genre, $disc_label, $disc_price, $disc_picture)); // Execute les requêtes


    header("Location: Accueil.php");




?>