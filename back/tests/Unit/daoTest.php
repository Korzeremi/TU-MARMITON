<?php

// utilisation de PHP unit et TestCase
use PHPUnit\Framework\TestCase;

// utilisation de dao.php
require_once '/Applications/XAMPP/xamppfiles/htdocs/TU-MARMITON/back/src/dao.php';

// Classe DAOTest pour effectuer nos TU
class DAOTest extends TestCase {
    private $pdo;
    private $dao;

    // Fonction setUp pour configurer DB et declarer la variable DAO
    protected function setUp(): void
    {
        $this->configureDatabase();
        $this->dao = new DAO($this->pdo);
    }

    // Fonction de configuration de la DB à partir du .env (il faut dotenv)
    private function configureDatabase(): void
    {
        $this->pdo = new PDO(
            sprintf(
                'mysql:host=%s;port=%s;dbname=%s',
                getenv('DB_HOST'),
                getenv('DB_PORT'),
                getenv('DB_DATABASE')
            ),            
            getenv('DB_USERNAME'),
            getenv('DB_PASSWORD')
        );

        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    // fonction TU d ajout de categorie
    public function testAddCategorie()
    {
        $testCategorie = new Categorie(
            "TestAjoutCategorie",
            "img"
        );
        $this->dao->addCategorie($testCategorie);
        $stmt = $this->pdo->query("SELECT * FROM categorie WHERE nom = TestAjoutCategorie");
        $categorie = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->expectException(InvalidArgumentException::class); // EXCEPTION
        $this->expectExceptionMessage("Ajout de catégorie impossible");
        $this->assertEquals('img',$categorie['img']);
    }

    // Fonction TU d ajout de recette
    public function testAddRecette()
    {
        $testRecette = new Recette(
            "TestAjoutRecette",
            "img.png",
            "1",
            "2",
            "3",
            "4",
            "5",
            "6",
            "7",
            "8",
            "1"
        );
        $this->dao->addRecette($testRecette);
        $stmt = $this->pdo->query("SELECT * FROM recette WHERE nom = TestAjoutRecette");
        $recette = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Ajout de recette impossible");
        $this->assertEquals('TestAjoutRecette',$recette['nom']);
    }

    // Fonction TU d ajout d ingredient
    public function testAddIngredient() {
        $testIngredient = new Ingredient(
            "TestAjoutIngredient",
            "2",
            "img",
            "1"
        );
        $this->dao->addIngredient($testIngredient);
        $stmt = $this->pdo->query("SELECT * FROM ingredient WHERE nom = TestAjoutIngredient");
        $ingredient = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Ajout d'ingrédient impossible");
        $this->assertEquals('TestAjoutIngredient',$ingredient['nom']);
    }

    // Fonction TU d ajout de categorie
    public function testGetCategorie() {
        $testCategorie = new Categorie(
            "TestCategorie",
            "img"
        );
        $this->dao->addCategorie($testCategorie);
        $stmt = $this->pdo->query("SELECT * FROM categorie WHERE nom = TestCategorie");
        $categorie = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Récupération de catégories impossible");
        $this->assertEquals('TestCategorie',$categorie['nom']);
    }

    // Fonction TU de recuperation d'une recette
    public function testGetRecette() {
        $testRecette = new Recette(
            "TestRecette",
            "img.png",
            "1",
            "2",
            "3",
            "4",
            "5",
            "6",
            "7",
            "8",
            "1"
        );
        $this->dao->addRecette($testRecette);
        $stmt = $this->pdo->query("SELECT * FROM recette WHERE nom = TestRecette");
        $recette = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Récupération de recettes impossible");
        $this->assertEquals('TestRecette',$recette['nom']);
    }

    // Fonction TU de recuperation d une recette par son ID
    public function testGetRecetteById() {
        $stmt = $this->pdo->query("INSERT INTO recette(id, nom, img, etape1, etape2, etape3, etape4, etape5, etape6, etape7, etape8, id_categorie) VALUES(999, 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 1)");
        $stmt->execute();
        $stmt2 = $this->pdo->query("SELECT * FROM recette WHERE id = 999");
        $recette = $stmt2->fetch(PDO::FETCH_ASSOC);
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Récupération de recettes impossible");
        $this->assertEquals('test', $recette['nom']);
    }    
    
    // Fonction TU de recuperation d une recette par sa categorie
    public function testGetRecetteByCategorie() {
        $testRecette = new Recette(
            "TestRecetteByCategorie",
            "img.png",
            "1",
            "2",
            "3",
            "4",
            "5",
            "6",
            "7",
            "8",
            "1"
        );
        $this->dao->addRecette($testRecette);
        $recettes = $this->dao->getRecetteByCategorie("1");
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Récupération de recettes par catégorie impossible");
        $this->assertTrue(in_array($testRecette, $recettes));
    }
    
    // Fonction TU de recuperation d ingredients
    public function testGetIngredient() {
        $stmt = $this->pdo->query("INSERT INTO ingredient(id, nom, img, id_recette) VALUES(999, 'Test', 'test', '1')");
        $stmt->execute();
        $stmt2 = $this->pdo->query("SELECT * FROM ingredient WHERE id = 999");
        $ing = $stmt2->fetch(PDO::FETCH_ASSOC);
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Récupération des ingrédients impossible");
        $this->assertEquals('Test', $ing['nom']);

    }
    
    // Fonction TU de recuperation d un ingredient par une recette
    public function testGetIngredientByRecette() {
        $testRecette = new Recette(
            "TestRecetteForIngredient",
            "img.png",
            "1",
            "2",
            "3",
            "4",
            "5",
            "6",
            "7",
            "8",
            "1"
        );
        $this->dao->addRecette($testRecette);
        $testIngredient = new Ingredient(
            "TestIngredientForRecette",
            "2",
            "img",
            "1"
        );
        $this->dao->addIngredient($testIngredient);
        $ingredients = $this->dao->getIngredientByRecette("1");
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Récupération des ingrédients par recette impossible");
        $this->assertTrue(in_array($testIngredient, $ingredients));
        $this->assertEquals('Test', $ingredients->getNom());
    }

    // Fonction TU de suppression d une categorie par un ID
    public function testRemoveCategorieById() {
        $stmt = $this->pdo->query("INSERT INTO categorie(id, nom, img) VALUES(500, 'Test', 'test')");
        $stmt->execute();
        $stmt2 = $this->pdo->query("SELECT * FROM categorie WHERE id = 500");
        $cat = $stmt2->fetch(PDO::FETCH_ASSOC);
        $this->dao->removeCategorieById(500);
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Suppression des catégories par id impossible");
        $this->assertNotEquals("Test", $cat['nom']);
    }
    
    // Fonction TU de suppression d une recette par un ID
    public function testRemoveRecetteById() {
        $stmt = $this->pdo->query("INSERT INTO recette(id, nom, img, etape1, etape2, etape3, etape4, etape5, etape6, etape7, etape8, id_categorie) VALUES(9999, test, test, test, test, test, test, test, test, test, test, 1)");
        $stmt->execute();
        $stmt2 = $this->pdo->query("SELECT * FROM recette WHERE id = 9999");
        $rec2 = $stmt2->fetch(PDO::FETCH_ASSOC);
        $this->dao->removeRecetteById(9999);
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Suppression des recettes par id impossible");
        $this->assertNotEquals("test", $rec2['nom']);
    }
    
    // Fonction TU de suppression d un ingredient par un ID
    public function testRemoveIngredientById() {
        $stmt = $this->pdo->query("INSERT INTO ingredient(id, nom, img, id_recette) VALUES(9999, 'nom', 'test', 1)");
        $stmt->execute();
        $stmt2 = $this->pdo->query("SELECT * FROM ingredient WHERE id = 9999");
        $ing2 = $stmt2->fetch(PDO::FETCH_ASSOC);
        $this->dao->removeIngredientById(9999);
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Suppression des ingrédients par id impossible");
        $this->assertNotEquals("nom", $ing2['nom']);
    }
    

    // Fonction TU de recherche
    // Utilisation du dataProvider
 /**
     * @dataProvider searchProvider
     */
    public function testSearch($nom, $img, $etape1, $etape2, $etape3, $etape4, $etape5, $etape6, $etape7, $etape8, $idCategorie) {
        $testRecette = new Recette(
            $nom,
            $img,
            $etape1,
            $etape2,
            $etape3,
            $etape4,
            $etape5,
            $etape6,
            $etape7,
            $etape8,
            $idCategorie
        );
        $this->dao->addRecette($testRecette);
        $results = $this->dao->search($nom);
        $this->assertCount(1, $results);
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Recherche impossible");
        $this->assertEquals($nom, $results[0]->getNom());
        $this->assertEquals($img, $results[0]->getImage());
    }

    // Fonction provider pour stocker des données utilisés testSearch()
    public function searchProvider()
    {
        return [
            ["Recette1", "img1.png", "1", "2", "3", "4", "5", "6", "7", "8", "1"],
            ["Recette2", "img2.png", "1", "2", "3", "4", "5", "6", "7", "8", "2"],
            ["Recette3", "img3.png", "1", "2", "3", "4", "5", "6", "7", "8", "1"],
        ];
    }
}