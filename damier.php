<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <div class='damier'>
    <?php
    // $i = 0 valeur initiale
    // $i < 25 elle s'arretera à 24
    // $i++ => la boucle à chaque cycle augmente de 1
        for ($i = 0; $i < 25; $i++) {
            if( $i % 2 == 0 ){
                echo "<div class='square black'></div>";
            }else{
                echo "<div class='square white'></div>";
            }
        }
    ?>
    </div>
</body>
</html>