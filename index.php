<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <?php 
    $date = new DateTime ;
    $formatter = new IntlDateFormatter("fr_FR", IntlDateFormatter::FULL );
    $formatter->setPattern("dd/MM/yyyy  'il est'  HH:mm:ss");
    echo "<h1> Coucou nous somme le " . $formatter->format($date) . "</h1>";

    // $date = new DateTime("now");
    // echo "Coucou nous somme le " . $date->format("d/m/Y") . "et il est" . $date->format("H:i:s") . "."; 
    
    // $date1 = new DateTime('2023-01-01');
    // $date2 = new DateTime('now');
    // $interval = $date1->diff($date2);
    // $nombreDeJours = $interval->days;
    // echo "<h2>Il y a $nombreDeJours jours entre les deux dates.<h2>";

    // DateTime|string, int|null, boll|void ===> on appelle ça une UNION de type
    function dateCountBetweenTwoDate(DateTime|string $beginDate, DateTime|string $enDate) : int {
        try{
            // la date de départ
            $start = gettype($beginDate) == 'string' ? new DateTime($beginDate) : $beginDate;
            // la date de fin
            $end = gettype($enDate) == 'string' ? new DateTime($enDate) : $enDate;
            // DateInterval nous donne l'unité de temps pour calculer l'écart entre deux date
            // par exemple P1M ===> tous les mois, P6M ==> tous les 6 mois
            // P6MT10M ==> tous les 6 mois ET 10 minutes
            $interval = new DateInterval('P1D');
            // $period est un générateur qui permet donc de "généré" les dates de manière paresseuse.
            // paresseuse ==> Lazy en anglais ==> faire quelques chose 1 par 1
            $period = new DatePeriod($start, $interval, $end);
            // on crée un compteur
            $zero = 0;
            // Un générateur se lit comme un tableau, donc nous utiliserons un foreach.
            foreach ($period as $date) {
                // Quand Vous faites "format('N')" cela désigne le numero du jour dans la semaine 
                // par exemple Lundi = 1, mercredi = 3
                if($date->format('N') < 6){
                    // A chaque nouvelle date nous allons incrémenter de 1 le compteur .
                    $zero++;
                }
            }
            // on affiche le nombre de jours
            return $zero;
        }catch(Exception $e) {
            throw new Exception("ta fonction ne marche pas !!");
        }
    }
    $d1 = new DateTime("1947-02-01");
    $d2 = new DateTime("2010-02-01");
    echo dateCountBetweenTwoDate($d1, $d2);
    // echo dateCountBetweenTwoDate("ton chien est bête.", "Kamoulox");
    // on affiche le nombre de jours.
    ?>

    <form action="" class="mx-auto col-8" method="POST">
        <label for="date-debut">Date de début</label>
        <input class="form-control" type="date" name="date-debut">

        <label for="date-fin">Date de Fin</label>
        <input class="form-control" type="date" name="date-fin">

        <label for="taux">Taux horaire</label>
        <input class="form-control" type="number step" name="taux">

        <input class="form-control mt-3" type="submit" value="Ajouter">
    </form>

    <?php 
        // on verifie que les input ne sont pas vides
       if(!empty($_POST["date-debut"]) && !empty($_POST["date-fin"]) && !empty($_POST["taux"])){
            //on met les date des input dans les date time, cepandant cela n'est obligatoire
            $db = $_POST["date-debut"];  
            $de = $_POST["date-fin"];
            $taux = $_POST["taux"] ;
            // on recupère le nombres de jours travaillés hors weekend
            $nbrDeJour = dateCountBetweenTwoDate($db, $de);
            //on a la tax de la france 
            $tax = 0.23;
            //la on calcule le salaire sur 8 heure pas jour pas mois
            $salary = $nbrDeJour * 8 * $taux; 
            // Ici on calcule le salaire net
            $netSalary = $salary - ($salary * $tax);
            echo "<h1>vous avez travailleé $nbrDeJour jours. votre salaire brut est de $salary, votre salaire net est de $netSalary </h1>" ;
        } 

        for ($i=0; $i <50 ; $i++) { 
            echo rand(0, 100), " " ;
        }

        $list = [14, 19, 245, 89, 78];

        for ($i = 0; $i < count($list); $i++) {
            if( $i % 2 == 0 ){
                echo "<br>" . -$list[$i] ;
            }else{
                echo "<br>" . $list[$i] ;
            }
        }
    ?>

    <table>
    <?php 
        for ($row=1; $row <= 10 ; $row++) { 
            echo  "<tr> \n";
            for ($col=1; $col <= 10 ; $col++) { 
                $p = $col * $row;
                echo  "<td>$p</td> \n";
            }
            echo "</tr>";
        }
    ?>
        </tbody>
    </table>

    <?php
    
    // 2! = 1 * 2 
    // 6! = 1 * 2 * 3 * 4 * 5 * 6 


        function resultFactoriel($nbr) {
            $memNbr = 1; // Initialise une variable pour stocker le résultat du calcul du factoriel, commence à 1 car toute multiplication par 1 ne change pas la valeur.
            for ($i=1; $i <= $nbr ; $i++) { // Débute une boucle for qui itère de 1 à la valeur de $nbr inclus.
                $memNbr *= $i  ; // Multiplie la valeur actuelle de $memNbr par la valeur de $i à chaque itération.
            }
            return $memNbr; // Retourne le résultat final du calcul du factoriel.
        }
        echo resultFactoriel(20);


    ?>
    
</body>
</html>