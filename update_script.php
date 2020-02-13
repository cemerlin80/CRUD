<?php
    require("db.php");
    $disc_title = htmlspecialchars($_POST["disc_title"]); 
    $artist_id = htmlspecialchars($_POST["artist_id"]);
    $disc_year = htmlspecialchars($_POST["disc_year"]);
    $disc_genre = htmlspecialchars($_POST["disc_genre"]);
    $disc_label = htmlspecialchars($_POST["disc_label"]);
    $disc_price = htmlspecialchars($_POST["disc_price"]);
    $disc_id = htmlspecialchars($_POST["disc_id"]);

    
    
    $requete = $db->prepare("update disc set disc_title=?, artist_id=?, disc_year=?, disc_genre=?, disc_label=?, disc_price=? where disc_id=?");

    $requete->execute(array($disc_title, $artist_id, $disc_year, $disc_genre, $disc_label, $disc_price, $disc_id));

    if ($_FILES["disc_picture"]["name"]) {
        $mime = mime_content_type($_FILES["disc_picture"]["tmp_name"]);
    
        $tab = explode("/", $mime);
        $disc_picture = $disc_title . "." . $tab[1];
    
        move_uploaded_file($_FILES["disc_picture"]["tmp_name"], "images/" . $disc_picture);

        $requete = $db->prepare("update disc set disc_picture=? where disc_id=?");

        $requete->execute(array($disc_picture, $disc_id));

    }

    header("Location: Accueil.php");