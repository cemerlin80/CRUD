<?php
try {
    $db = new PDO("mysql:host=localhost;dbname=record;charset=utf8", "root", "280390");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $er) {
    echo $er->getMessage();
}
