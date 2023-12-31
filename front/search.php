<!-- Page pour recherche -->
<?php include '../back/src/dao.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🙍🏻‍♀️ KOUIZINE</title>
    <link rel="stylesheet" href="search.scss">
</head>
<body>
    <div class="navbar-sct">
            <div class="topbar-sct">
                <div class="logo-sct" style="margin: 0 0 0 2rem">
                    <a href="./" style="color: black; text-decoration: none">🍴 KOUIZINE</a>
                </div>
                <div class="search-sct">
                    <a class='link' href="gestion.php">
                        <img src="assets/data.svg">
                    </a>
                    <form action="search.php" method="post">
                        <input type="search" name="searchbar" id="searchbar" placeholder='Des recettes, des ingrédients...' required/>
                        <div id="img">
                            <input type="image" src='assets/search-icon.svg'></input>
                        </div>
                    </form>
                </div>
            </div>
            <div class="botbar-sct">
                <div class="allbtn-sct">
                    <?php
                    // recuperation des categories
                    $categories = $DAO->getCategorie();
                    $counter = 0;
                    // boucle for pour recuperer les categories
                    foreach ($categories as $categorie) {
                        if ($counter < 6) {
                            echo '<div class="btn-sct">';
                            echo '<a href="categorie.php?id=' . ($counter + 1) . '" style="color: black; text-decoration: none; display: flex;">';
                            echo '<div id="img">';
                            echo "<img src='{$categorie['img']}' id='btnImg'></img>";
                            echo '</div>';
                            echo '<div id="label">';
                            echo "<p>{$categorie['nom']}</p>";
                            echo '</div>';
                            echo '</a>';
                            echo '</div>';       
                            $counter++;
                        } else {
                            break;
                        }
                    }
                    ?>
                </div>
            </div>
    </div>
    <div class="content-sct">
        <?php
            // affichage des resultats de la recherche si des resultats on etait trouves
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST["searchbar"])) { //si resultat
                    $searchValue = $_POST["searchbar"];
                    echo "<div class='search-sct'>";
                    echo "<div class='title-sct'>";
                    echo "<h2>Résultats de la recherche 🔍</h2>";
                    echo "</div>";
                    echo "<div class='grid-sct'>";
                    echo "<div class='grid'>";
                    $recherche = $DAO->search($searchValue);
                    foreach ($recherche as $resultat) {
                        echo "<div class='grid'>";
                        echo '<a class="link" href="recette.php?id=' . $resultat['id'] . '" style="color: black; text-decoration: none;">';
                        echo "<div id='img'><img src='{$resultat['img']}'></img></div>";
                        echo "<div id='name'><p>{$resultat['nom']}</p>";
                        echo "</div>";
                        echo "</div>";
                    }
                        
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                }
            } else {
                echo "Le formulaire n'a pas été soumis en méthode POST.";
            }
        ?>
    </div>
</body>
</html>
