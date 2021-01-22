<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title><?=$metaTitle?></title>
    <link rel="stylesheet" href="/pages/style.css"/>
</head>
<body>
<header>

    <div id="entete">
        <h1 id="f1">CV BOUNIA Yannis Etudiant Technicien Développeur</h1>

        <img
                src="/pages/IMG_4728.JPG"
                alt="photo"
                id="photo"
                class="avatar"
                height="100"
                width="100"
                title="Yannis BOUNIA"
        />
    </div>

    <div id="campus">
        <h2 id="f2">Campus numérique in the Alps</h2>
    </div>

    <div class="boutonnav" id="navmain">
        <a class="<?php if ($page=="accueil"){echo "active";} else{echo "boutonsnav";} ?>" href="./index.php?page=accueil">CV</a>
        <a class="<?php if ($page=="hobby"){echo "active";} else{echo "boutonsnav";} ?>" href="./index.php?page=hobby">Hobby</a>
        <a class="<?php if ($page=="video"){echo "active";} else{echo "boutonsnav";} ?>" href="./index.php?page=video">Vidéo</a>
        <a class="<?php if ($page=="contact"){echo "active";} else{echo "boutonsnav";} ?>" href="./index.php?page=contact">Contact</a>
    </div>
</header>